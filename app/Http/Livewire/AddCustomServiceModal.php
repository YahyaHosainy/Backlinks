<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AddCustomServiceModal
 * @package App\Http\Livewire
 */
class AddCustomServiceModal extends Component
{
    public $code;

    public $description;

    public $short_description;

    public $min_qte = 0;

    public $price_per_item = 0;

    public $active = 1;

    /**
     * Save the new
     */
    public function addNewService()
    {
        // Validate data
        $validatedData = $this->validate([
            'code' => 'required|string',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'price_per_item' => 'required|numeric|min:0',
            'active' => 'required|boolean',
            'min_qte' => 'required|numeric|min:1'
        ]);

        // Create a random id
        $validatedData['id'] = (new \DateTimeImmutable())->getTimestamp();
        $validatedData['is_personal'] = 1;

        // Store the service
        $service = Service::create($validatedData);
        $service->save();

        // Emit an event to update the tableview data
        $this->emit('updateServicePriceTable');

        // Add a flash message
        session()->flash('successAdd', 'The custom service has been added successfully !');

        // Reset form fields
        $this->resetForm();
    }

    /**
     * Rest form fields
     */
    public function resetForm()
    {
        $this->code = "";
        $this->description = "";
        $this->min_qte = 0;
        $this->price_per_item = 0;
        $this->active = 1;
        $this->short_description = "";
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.add-custom-service-modal');
    }
}
