<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DotEnvModification\DotEnvModification;
use App\Models\ApiExtra;
use App\Models\ApiService;
use App\Models\Extra;
use App\Models\Percent;
use App\Models\ProfitPercent;
use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class ApiSettingsForm
 * @package App\Http\Livewire
 */
class ApiSettingsForm extends Component
{
    // Public Attributes
    public $token;
    public $service_price_percent = 0;
    public $extras_price_percent = 0;
    public $services;
    public $extras;
    public $servicesWithPercentage = [];
    public $extrasWithPercentage = [];

    // Private Attributes
    private ?ProfitPercent $profitPercent;

    /**
     * @var array
     */
    protected $rules = [
      'token' => 'required|string',
      'service_price_percent' => 'required|numeric',
      'extras_price_percent' => 'required|numeric'
    ];

    /**
     * ApiSettingsForm constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->profitPercent = ProfitPercent::first();
        parent::__construct($id);
    }

    /**
     * Called while mounting the component
     */
    public function mount()
    {
        $this->token = env('SEOESTORE_API_KEY');
        $this->services = Service::query()->where('active','1')->get();
        $this->extras = Extra::query()->where('active','1')->get();

        // Load services codes
        foreach ($this->services as $service) {
            $this->servicesWithPercentage[] = $service->code;
        }

        // Load extras codes
        foreach ($this->extras as $extra) {
            $this->extrasWithPercentage[] = $extra->code;
        }

        // Load the profit percentages
        if ($this->profitPercent !== null) {
            $this->service_price_percent = $this->profitPercent->service;
            $this->extras_price_percent = $this->profitPercent->extra;
        }
    }

    /**
     * Reset all the prices to the API ones
     */
    public function backToApiPrices()
    {
        // Fetch all services from API
        $url = "https://panel.seoestore.net/action/api.php";

        $apiServices = ApiService::all();

        $apiExtras = ApiExtra::all();

        // Update the extras prices
        foreach ($this->extras as $extra) {
            foreach ($apiExtras as $apiExtra) {
                if ($extra->code === $apiExtra->code) {
                    $extra->price_per_item = $apiExtra->price_per_item;
                    $extra->save();
                }
            }
        }

        // Update the services prices
        foreach ($this->services as $service) {
            foreach ($apiServices as $apiService) {
                if ($service->code === $apiService->code) {
                    $service->price_per_item = $apiService->price_per_item;
                    $service->save();
                }
            }
        }

        // Delete the profit percent
        if ($this->profitPercent !== null) {
            $this->profitPercent->delete();
        }

        // Reset profit values
        $this->service_price_percent = 0;
        $this->extras_price_percent = 0;

        // Show a message to the user to indicate that the prices are synchronized
        session()->flash('prices_updated', 'All prices are synchronized with the API prices !');
    }

    /**
     * Reset Extras List
     */
    public function unselectAllExtras()
    {
        $this->extrasWithPercentage = [];
    }

    /**
     * Reset Services List
     */
    public function unselectAllServices()
    {
        $this->servicesWithPercentage = [];
    }

    /*
     * Save the changes
     */
    public function saveChanges()
    {
        // Validate the user's data
        $this->validate();

        // Check if there is any previous profit percentages
        if ($this->profitPercent !== null) {
            $this->profitPercent->service = $this->service_price_percent;
            $this->profitPercent->extra = $this->extras_price_percent;
            $this->profitPercent->save();
        } else {
            // Create the profit percentage
            $profitPercentage = new ProfitPercent();
            $profitPercentage->service = $this->service_price_percent;
            $profitPercentage->extra = $this->extras_price_percent;
            $profitPercentage->save();
        }

        // Update the services price
        if (!empty($this->servicesWithPercentage)) {
            foreach ($this->servicesWithPercentage as $newService) {
                $service = $this->services->filter(fn($sv) => $sv->code == $newService)->first();
                $service->price_per_item += $service->price_per_item * floatval($this->service_price_percent) / 100 ;
                $service->save();
            }
        }

        // Update the extras price
        if (!empty($this->extrasWithPercentage)) {
            foreach ($this->extrasWithPercentage as $newExtra) {
                $extra = $this->extras->filter(fn($sv) => $sv->code == $newExtra)->first();
                $extra->price_per_item += $extra->price_per_item * floatval($this->extras_price_percent) / 100 ;
                $extra->save();
            }
        }

        // Update the token
        $changeEnv = new DotEnvModification();
        $changeEnv->changeEnv([
            'SEOESTORE_API_KEY' => $this->token
        ]);

        // Show a success message
        session()->flash('api_settings_saved', 'Changes saved !');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.api-settings-form');
    }
}
