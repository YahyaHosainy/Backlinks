<?php

namespace App\Http\Livewire;

use App\Models\ApiExtra;
use App\Models\ApiService;
use App\Models\Extra;
use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class SyncServicePrices
 * @package App\Http\Livewire
 */
class SyncServicePrices extends Component
{
    /**
     * Sync the services prices with the API
     */
    public function syncServicePrices()
    {
        // Api url
        $url = env('SEOESTORE_URL');

        // Fetch the services from the api
        $services = Http::asForm()->post( $url , [
            'api_key' => env('SEOESTORE_API_KEY'),
            'email' => env('SEOESTORE_EMAIL'),
            'action' => 'services'
        ])->json();

        // Get all the services stored in the DB
        $dbServices = Service::all();

        // Update the services prices in the DB
        foreach ($services as $service) {
            foreach ($dbServices as $dbService) {
                if ($dbService->id == $service['id']) {
                    $dbService->update([
                        'price_per_item' => $service['price'] / 100
                    ]);
                }
            }
        }

        // Show a success message
        session()->flash('service_prices_synchronized', 'The services prices synchronized successfully with the API !');

        // Emit a Livewire event to update the table values instantly
        $this->emit('updateServicePriceTable');
    }

    public function syncApiServices()
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

        // Check the other services
        $apiExtras = ApiExtra::all();
        foreach($apiExtras as $apiExtra) {
            $storedExtra  = Extra::query()->find($apiExtra->id);
            if ($storedExtra == null ) {
                Extra::query()->create(
                    [
                        'id' => $apiExtra->id,
                        'code' => $apiExtra->code,
                        'description' => $apiExtra->description,
                        'price_per_item' =>  $apiExtra->price / 100
                    ]
                );
            }
        }

        $apiServices = ApiService::all();
        $count = 0;
        foreach($apiServices as $apiService) {
            $storedService  = Service::query()->find($apiService->id);
            if ($storedService == null ) {
                $count++;
                Service::query()->create([
                    'id' => $apiService->id,
                    'code' => $apiService->code,
                    'description' => $apiService->description,
                    'min_qte' => $apiService->min_qte,
                    'price_per_item' => $apiService->price / 100
                ]);
            }
        }

        session()->flash('api_update', 'Api services & extras are now updated with the API.');

        $this->emit('updateServicePriceTable');

    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.service.includes.sync-service-prices');
    }
}
