<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class DeleteServiceModal
 * @package App\Http\Livewire
 */
class DeleteServiceModal extends Component
{
    /**
     * @var null
     */
    public $service = null;

    /**
     * @var array
     */
    protected $listeners = [
      'deleteService' => 'deleteService'
    ];

    /**
     * Delete a given Service
     *
     * @param Service $service
     */
    public function deleteService(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Delete the received service during the event
     */
    public function delete()
    {
        $service = Service::find($this->service->id);
        $service->delete();
        $this->service = null;
        // Emit an event to update the tableview data
        $this->emit('updateServicePriceTable');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.service.includes.delete');
    }
}
