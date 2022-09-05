<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class UpdateServiceModal
 * @package App\Http\Livewire
 */
class UpdateServiceModal extends Component
{
    public $code;
    public $description;
    public $price_per_item;
    public $min_qte;
    public $serviceId;
    public $active;
    public $short_description;
    public $isPersonal;

    // Listeners to test if the ServicePrice is modified or not
    protected $listeners = [
        'updateModalValues' => 'updateModalValues'
    ];

    /**
     * Get the concerned service to modify through a service
     *
     * @param Service $service
     */
    public function updateModalValues(Service $service)
    {
        $this->serviceId = $service->id;
        $this->code = $service->code;
        $this->description = $service->description;
        $this->price_per_item = $service->price_per_item;
        $this->min_qte = $service->min_qte;
        $this->active = $service->active;
        $this->short_description = $service->short_description;
        $this->isPersonal = $service->is_personal;
    }

    /**
     * Update a service
     */
    public function update()
    {
        // Validate the received data
        $validatedDate = $this->validate([
            'code' => 'required',
            'description' => 'required',
            'min_qte' => 'required|numeric',
            'price_per_item' => 'required|numeric',
            'active' => 'required|boolean',
            'short_description' => 'required'
        ]);

        // Fetch the concerned service
        $service = Service::find($this->serviceId);

        // Update the service
        $service->update($validatedDate);

        // Setup a flash message to show that the service is updated
        session()->flash('service-updated', 'Users Updated Successfully.');

        // Emit an event to update the tableview data
        $this->emit('updateServicePriceTable');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.service.includes.update');
    }
}
