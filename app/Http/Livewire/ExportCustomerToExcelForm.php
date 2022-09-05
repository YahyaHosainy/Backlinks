<?php

namespace App\Http\Livewire;

use App\Exports\CustomersExport;
use App\Exports\PaymentsExport;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ExportCustomerToExcelForm
 * @package App\Http\Livewire
 */
class ExportCustomerToExcelForm extends Component
{
    /**
     * @var
     */
    public $start_date;

    /**
     * @var
     */
    public $end_date;

    /**
     * @var array
     */
    protected $rules = [
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date'
    ];

    /**
     * Export Payment to Excel
     */
    public function export()
    {
        // Validate date
        $this->validate();

        // Get payments based on the start date & end date
        $customers = User::query()
            ->whereDate('created_at', '>=', Carbon::parse($this->start_date)->startOfDay())
            ->whereDate('created_at', '<=', Carbon::parse($this->end_date)->endOfDay())
            ->get();

        // Export payments between the two dates above - By default it's the last 7 days
        return Excel::download(new CustomersExport($customers), 'customers.xlsx');
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.export-customer-to-excel-form');
    }
}
