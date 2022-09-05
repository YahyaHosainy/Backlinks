<?php

namespace App\Http\Livewire;

use App\Models\Extra;
use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class SyncExtraPrices
 * @package App\Http\Livewire
 */
class SyncExtraPrices extends Component
{
    /**
     * Synchronize Extra prices with API
     */
    public function syncExtraPrices()
    {
        // Api url
        $url = env('SEOESTORE_URL');

        // Fetch the extra services from the api
        $extras = Http::asForm()->post( $url , [
            'api_key' => env('SEOESTORE_API_KEY'),
            'email' => env('SEOESTORE_EMAIL'),
            'action' => 'extras'
        ])->json();

        // Get all the services stored in the DB
        $dbExtraServices = Extra::all();

        // Update the services prices in the DB
        foreach ($dbExtraServices as $dbExtraService) {
            foreach ($extras as $extra) {
                if ($dbExtraService->id == $extra['id']) {
                    $dbExtraService->update([
                        'price_per_item' => $extra['price'] / 100
                    ]);
                }
            }
        }

        // Show a success message
        session()->flash('extras_prices_synchronized', 'The extra services prices synchronized successfully with the API !');

        // Emit an event to update the table values instantly
        $this->emit('updateExtraServicePriceTable');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.extra.includes.sync-extra-prices');
    }
}
