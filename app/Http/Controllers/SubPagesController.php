<?php

namespace App\Http\Controllers;

use App\Models\ApiExtra;
use App\Models\ApiService;
use App\Models\SeoSetting;
use App\Models\PremiumSite;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Canvas\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\GTMConfig;
use Illuminate\Support\Facades\Auth;

/**
 * Class SubPagesController
 * @package App\Http\Controllers
 */
class SubPagesController extends Controller
{
    public function faq()
    {
        return view('sub-pages/FAQ');
    }

    /**
     * @return Factory|View
     */
    public function terms_of_use()
    {
        return view('sub-pages/terms-of-use');
    }

    /**
     * @return Factory|View
     */
    public function privacy_policy()
    {
        return view('sub-pages/privacy-policy');
    }

    /**
     * @return Factory|View
     */
    public function services(REQUEST $request)
    {
        if ($request->id) {
            return redirect()->to('/services',301);
         }

        return view('sub-pages/services');
    }

    /**
     * @return Factory|View
     */
    public function about()
    {
        return view('sub-pages/about');
    }
    /**
     * @return Factory|View
     */
    public function thanks_page()
    {
        $gtm = GTMConfig::first();
        $gtmHead = "";
        $gtmBody = "";

        if ($gtm !=null) {
            $gtmHead = $gtm->headPart;
            $gtmBody = $gtm->bodyPart;
        }

        return view('sub-pages/thanksPage',[
            'gtmHead' => $gtmHead,
            'gtmBody' => $gtmBody
        ]);
    }

    /**
     * @return Factory|View
     */
    public function contact_us()
    {
        return view('sub-pages/contact-us');
    } 
    
    /**
     * @return Factory|View
     */
    public function premium_sites(Request $request)
    {
        $sites = PremiumSite::orderBy('created_at','desc')
        ->paginate(12);
        if($request->ajax())
        {
            $view = view('sub-pages/premium-sites/data',compact('sites'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('sub-pages/premium-sites/index', compact('sites'));
    }
     /**
     * @return Factory|View
     */
    public function already_have_account()
    {
        return view('sub-pages/already-have-account');        
    }
}
