<?php

namespace App\Http\Livewire;

use App\Mail\OrderCompleted;
use App\Models\Report;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class ReportsPollingBloc
 * @package App\Http\Livewire
 */
class ReportsPollingBloc extends Component
{
    /**
     * Fetch the order's reports
     */
    public function fetchReports()
    {
        // Get all reports
        $reports = Report::query()
            ->where('download_url', null)
            ->get();

        // Get reports of non personal services
        $reports = $reports->filter(fn($report) => !$report->order->service->is_personal);

        // fetch all orders status
        foreach ($reports as $report) {
            // Get the order status
            $orderStatus = Http::asForm()->post( env('SEOESTORE_URL'), [
                'api_key' => env('SEOESTORE_API_KEY'),
                'email' => env('SEOESTORE_EMAIL'),
                'action' => 'order_status',
                'order_id' => $report->order_id
            ])->json();

            // Check if the report status is changed
            if (isset($orderStatus['status']) && $orderStatus['status'] != $report->status) {
                // Update the status of the report
                $report->update([
                    'status' => $orderStatus['status']
                ]);

                // Check the availability of the report for an order
                $reportStatus = Http::asForm()->post( env('SEOESTORE_URL'), [
                    'api_key' => env('SEOESTORE_API_KEY'),
                    'email' => env('SEOESTORE_EMAIL'),
                    'action' => 'report',
                    'order_id' => $report->order_id
                ])->json();

                // Check if the report is available or not yet
                if (isset($reportStatus['report'])) {
                    // Update the report download url value
                    $report->update([
                        'download_url' =>  $reportStatus['report']
                    ]);

                    // Send User Notification to inform him if the order is completed
                    if (strcmp($orderStatus['status'], 'Completed') == 0) {
                        $userEmail = $report->user->email;
                        Mail::to($userEmail)->send(new OrderCompleted($report));
                    }

                    // Emit an event to refresh the reports table
                    $this->emit('updateReportsTable');
                }
            }
        }
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.reports-polling-bloc');
    }
}
