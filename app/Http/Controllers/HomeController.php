<?php

namespace App\Http\Controllers;

use App\Models\ApiExtra;
use App\Models\ApiService;
use App\Models\Bloc;
use App\Models\Extra;
use App\Models\GTMConfig;
use App\Models\SeoSetting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Canvas\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * Load all Seo settings for the home page
     */
    public function __construct()
    {
        // Load the Seo Meta Data from DB
        $seoSettings = SeoSetting::first();

        // Check if there is any stored SEO Settings
        if ($seoSettings !== null) {
            // SEO Meta attributes
            SEOMeta::setTitle($seoSettings->seo_meta_title);
            SEOMeta::setDescription($seoSettings->seo_meta_description);
            SEOMeta::setKeywords(json_decode($seoSettings->keywords));

            // OpenGraph Seo attributes
            OpenGraph::setTitle($seoSettings->opengraph_title);
            OpenGraph::setDescription($seoSettings->opengraph_description);
            OpenGraph::setUrl($seoSettings->opengraph_url);

            // JsonLd Seo attributes
            JsonLd::setTitle($seoSettings->seo_meta_title); // title of twitter card tag
            JsonLd::setDescription($seoSettings->description);
        }
    }

    /**
     * @return Factory|View
     */
    public function index(REQUEST $request)
    {
        //redirecting spammy links
        // if ($request->ref || $request->tdistatus) {
        //     return redirect()->to('/',301);
        // }
        $bonus = env('BONUS_FUNDS_GREATER_THAN_ONE_HUNDRED');
        $funds = env('BONUS_FUNDS_VALUE');

        $banner = Bloc::query()->where('bloc_name','=','pages_footer_banner')->first();

        // Get Seo Settings
        $seoSettings = SeoSetting::first();
        $twitterTitle = '';
        $twitterDescription = '';

        if ($seoSettings != null) {
            $twitterTitle = $seoSettings->seo_meta_title;
            $twitterDescription = $seoSettings->seo_meta_description;
        }

        // Get GTM Settings
        $gtm = GTMConfig::first();
        $gtmHead = "";
        $gtmBody = "";

        if ($gtm !=null) {
            $gtmHead = $gtm->headPart;
            $gtmBody = $gtm->bodyPart;
        }





        // Get the latest posts
        $latestPosts = Post::query()
                ->limit(3)
                ->whereDate('published_at', '<=', now())
                ->orderBy('published_at', 'desc')
                ->get();

        return view('welcome', [
            "twitter_title" => $twitterTitle,
            "twitter_description" => $twitterDescription,
            'gtmHead' => $gtmHead,
            'gtmBody' => $gtmBody,
            'banner' => $banner,
            'bonus'=>$bonus,
            'funds'=>$funds
        ]);
    }

    /**
     * Fill ApiService & ApiExtra tables
     */
    public function fill()
    {
        // Fetch all Extra services from API
        $url = "https://panel.seoestore.net/action/api.php";
        $extras = Http::asForm()->post( $url , [
            'api_key' => env('SEOESTORE_API_KEY'),
            'email' => env('SEOESTORE_EMAIL'),
            'action' => 'extras'
        ])->json();

        ApiExtra::query()->truncate();

        // Insert all received services into database
        foreach ($extras as $extra) {
            ApiExtra::query()->create(
                [
                    'id' => $extra['id'],
                    'code' => $extra['code'],
                    'description' => $extra['description'],
                    'price_per_item' => $extra['price'] / 100
                ]
            );
        }

        // Fetch all services from API
        $services = Http::asForm()->post( $url , [
            'api_key' => env('SEOESTORE_API_KEY'),
            'email' => env('SEOESTORE_EMAIL'),
            'action' => 'services'
        ])->json();

        ApiService::query()->truncate();

        // Insert all received services into database
        foreach ($services as $service) {
            ApiService::query()->create([
                'id' => $service['id'],
                'code' => $service['code'],
                'description' => $service['description'],
                'min_qte' => $service['min_qty'],
                'price_per_item' => $service['price'] / 100
            ]);
        }

        dd("Filling API tables done successfully !");
    }
}
