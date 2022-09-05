<?php

namespace App\Http\Livewire;

use App\Models\Extra;
use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class UpdateExtraModal
 * @package App\Http\Livewire
 */
class UpdateExtraModal extends Component
{
    public $code;
    public $description;
    public $price_per_item;
    public $extraId;
    public $active;

    // Listeners to test if the ServicePrice is modified or not
    protected $listeners = [
        'extraUpdateModalValues' => 'extraUpdateModalValues'
    ];

    /**
     * Get the concerned service to modify through a service
     *
     * @param Extra $extra
     */
    public function extraUpdateModalValues(Extra $extra)
    {
        $this->extraId = $extra->id;
        $this->code = $extra->code;
        $this->description = $extra->description;
        $this->price_per_item = $extra->price_per_item;
        $this->active = $extra->active;
    }

    /**
     * Update an extra service
     */
    public function update()
    {
        // Validate the received data
        $validatedDate = $this->validate([
            'code' => 'required',
            'description' => 'required',
            'price_per_item' => 'required|numeric',
            'active' => 'required|boolean'
        ]);

        // Fetch the concerned service
        $extra = Extra::find($this->extraId);

        // Update the service
        $extra->update($validatedDate);

        // Setup a flash message to show that the service is updated
        session()->flash('extra-service-updated', 'Extra Service updated successfully !');

        // Emit an event to update the table view data
        $this->emit('updateExtraServicePriceTable');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.extra.includes.update');
    }
}
