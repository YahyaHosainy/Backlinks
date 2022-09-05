<?php

namespace App\Http\Livewire;

use App\Models\ApiExtra;
use App\Models\ApiService;
use App\Models\Extra;
use App\Models\Service;
use App\Models\ServiceExtra;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\GTMConfig;

/**
 * Class ServicePrices
 * @package App\Http\Livewire
 */
class ServicePrices extends Component
{
    /**
     * ServicePrices constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        // Fetch services from DB
        $services = Service::all();

        // Fetch extra services from the DB
        $extras = Extra::all();

        // Check if there is any extra services on the DB
        if ($extras->isEmpty()) {
            // Fetch all Extra services from API
            $url = "https://panel.seoestore.net/action/api.php";
            $extras = Http::asForm()->post( $url , [
                'api_key' => env('SEOESTORE_API_KEY'),
                'email' => env('SEOESTORE_EMAIL'),
                'action' => 'extras'
            ])->json();
            // Insert all received services into database
            foreach ($extras as $extra) {
                Extra::query()->create([
                    'id' => $extra['id'],
                    'code' => $extra['code'],
                    'description' => $extra['description'],
                    'price_per_item' => $extra['price'] / 100
                ]);
                ApiExtra::query()->create(
                    [
                        'id' => $extra['id'],
                        'code' => $extra['code'],
                        'description' => $extra['description'],
                        'price_per_item' => $extra['price'] / 100
                    ]
                );
            }
        }

        // If there is no services on the db we fetch all API Services
        if ($services->isEmpty()) {
            // Fetch all services from API
            $url = "https://panel.seoestore.net/action/api.php";
            $services = Http::asForm()->post( $url , [
                'api_key' => env('SEOESTORE_API_KEY'),
                'email' => env('SEOESTORE_EMAIL'),
                'action' => 'services'
            ])->json();

            // Insert all received services into database
            foreach ($services as $service) {
                Service::query()->create([
                    'id' => $service['id'],
                    'code' => $service['code'],
                    'description' => $service['description'],
                    'min_qte' => $service['min_qty'],
                    'price_per_item' => $service['price'] / 100
                ]);

                ApiService::query()->create([
                    'id' => $service['id'],
                    'code' => $service['code'],
                    'description' => $service['description'],
                    'min_qte' => $service['min_qty'],
                    'price_per_item' => $service['price'] / 100
                ]);

                // Service Extras
                $serviceExtras = explode(',',$service['extras']);

                // Creation of Service Extra in the DB
                foreach ($serviceExtras as $serviceExtra)
                {
                    ServiceExtra::create([
                        'service_id' => $service['id'],
                        'extra_id' => $serviceExtra
                    ]);
                }
            }
        }

        parent::__construct($id);
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
            // Get GTM Settings
            $gtm = GTMConfig::first();
            $gtmHead = "";
            $gtmBody = "";

            if ($gtm !=null) {
                $gtmHead = $gtm->headPart;
                $gtmBody = $gtm->bodyPart;
            }
            return view('livewire.service-prices', [
                'gtmHead' => $gtmHead,
                'gtmBody' => $gtmBody
            ]);
    }
}
