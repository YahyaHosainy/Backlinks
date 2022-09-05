<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Report;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadCustomReports extends Component
{
    use WithFileUploads;

    public $orderId;

    public $orders;

    public $report;

    protected $rules = [
        'orderId' => 'required',
        'report' => 'required'
    ];

    /**
     * Mount function
     */
    public function mount()
    {
        $this->orders = Order::all()->each(fn($order) => ($order->service->is_personal));
    }

    public function save()
    {
        $this->validate();

        // save the file
        //$order = $this->orders->filter(fn($order) => $order->id === intval($this->orderId));
        $report = Report::all()->filter(fn($report) => $report->order->id === intval($this->orderId))->first();
        $report->download_url = $this->report->store('reports','public');
        $report->status = 'Completed';
        $report->save();

        session()->flash('uploaded', 'The report has been uploaded successfully !');
    }

    public function render()
    {
        return view('livewire.upload-custom-reports');
    }
}
