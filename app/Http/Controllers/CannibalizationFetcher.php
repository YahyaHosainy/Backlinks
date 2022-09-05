<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\CannibalizationFetcherMails;
use App\Mail\CannibalizationFetcherFailed;
use Illuminate\Support\Facades\Validator;
use \DateTime;

use Illuminate\Http\Request;

class CannibalizationFetcher extends Controller
{
    public function get_google_token_object()
    {
        $google_token_object_string = auth()->user()->google_token_object;
        return json_decode($google_token_object_string);
    }

    public function view()
    {
        $expire = false;
        if (
            @$google_token_object_string = auth()->user()->google_token_object
        ) {
            $google_token_object = json_decode($google_token_object_string);
            $date = new DateTime();
            if (($google_token_object->expire_date - 60) < $date->getTimestamp()) {
                $expire = true;
            }
        } else {
            $google_token_object_string = null;
        }

        return view('CannibalizationFetcher',[
            'has_google_token' => !empty($google_token_object_string),
            'expire' => $expire
        ]);
    }

    private function Req(string $path, array $fields, callable $fun = null)
    {
        $server = env('CANNIBALIZATION_FETCHER_SERVER');

        $response = Http::timeout(3600)->withHeaders([
            'Content-Type' => 'application/json'
        ])->post("{$server}/{$path}?secret=".env('CANNIBALIZATION_FETCHER_SECRET','NULL'), $fields);

        $resData = $response->json();

        if ($fun !== null) {
            $fun($resData);
        }

        return response($resData, $response->status())
            ->header('Content-Type',$response->header('Content-Type'));
    }

    public function websites(Request $req)
    {
        return $this->Req('websites',[
            'google_token_object' => $this->get_google_token_object()
        ]);
    }

    public function cannibalize(Request $req)
    {
        return $this->Req('canibalize',[
            'site' => $req->site,
            'email' => $req->email,
            'google_token_object' => $this->get_google_token_object()
        ]);
    }

    public function finishWork(Request $req)
    {

        $v = Validator::make($req->all(),[
            'site' => 'required|string',
            'email' => 'required|string',
            'success' => 'required',
            'file' => 'required',
            'filename' => 'required|string',
        ]);

        if ($v->fails()) {
            return $v->errors();
        }

        if (
            !$req->secret or
            $req->secret !== env('CANNIBALIZATION_FETCHER_SECRET')
        ) {
            return response('Wrong token',401);
        }

        if ($req->success) {

            try {
                if ($req->hasFile('file') and $req->file('file')->isValid()) {
                    $statuesFile = $req->file->path();
                } elseif ($req->downloadPath) {
                    $statuesFile = tempnam(sys_get_temp_dir(), 'file_'.rand(1000,9999).'_cannibalization_resoult.xlsx');
                    copy($req->downloadPath, $statuesFile);
                } else {
                    return [
                        'success' => false,
                        'message' => 'not file found!'
                    ];
                }
                Mail::to($req->email)
                    ->send(new CannibalizationFetcherMails($req->email,$req->site,$statuesFile, $req->filename));
            } catch (\Throwable $th) {
                return [
                    'success' => false,
                    'err' => $th
                ];
            }
    
            return [
                'success' => true
            ];

        } else {
            Mail::to($req->email)->send(new CannibalizationFetcherFailed($req->email,$req->site));
            return [
                'success' => true
            ];
        }
    }
}
