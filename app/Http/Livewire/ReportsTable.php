<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Mixed_;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class ReportsTable
 * @package App\Http\Livewire
 */
class ReportsTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var array
     */
    protected $listeners = [
        'updateReportsTable' => 'render',
    ];

    /**
     * Download the report of an order
     * @param Report $report
     * @return BinaryFileResponse|Mixed
     */
    public function downloadReport(Report $report)
    {
        if (!$report->order->service->is_personal) {
            $reportUrl = explode('/', $report->download_url);
            $filename = end($reportUrl);
            $tempImage = tempnam(sys_get_temp_dir(), $filename);
            copy(env('SEOESTORE_REPORT_URL').$report->download_url, $tempImage);

            return response()->download($tempImage, $filename);
        }

        return Storage::download('public/'.$report->download_url);
    }

    /**
     * @inheritDoc
     */
    public function query(): Builder
    {
        if (auth()->user()->is_admin) {
            return Report::query()->orderBy('created_at', 'desc');
        }

        return Report::query()->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc');
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->searchable()
                ->sortable()
                ->format(function(Report $model) {
                    return $this->html('<strong> <span class="bg-blue-500 p-1  text-sm">'.$model->id.'</span></strong>');
                }),
            Column::make('Created', 'created_at')
                ->searchable()
                ->sortable(),
            Column::make('Service')
                ->format(function(Report $model) {
                    return view('livewire.reports.includes.service-column', ['report' => $model]);
                }),
            Column::make('Qty','qte')
                ->searchable()
                ->sortable(),
            Column::make('Status')
                ->searchable()
                ->sortable(),
            Column::make('Charge')
                ->searchable()
                ->sortable(),
            Column::make('Username','user.name')
                ->searchable(),
            Column::make('Details')
                ->format(function(Report $model) {
                    return view('livewire.reports.includes.details', ['report' => $model]);
                }),
            Column::make('Download')
                ->format(function(Report $model) {
                    return view('livewire.reports.includes.download', ['report' => $model]);
                }),
        ];
    }

    /**
     * Show links modal
     *
     * @param $report
     */
    public function showLinksModal($report)
    {
        $this->emit('showLinksModal', $report);
    }

    /**
     * Show Keywords modal
     *
     * @param $report
     */
    public function showKeywordsModal($report)
    {
        $this->emit('showKeywordsModal', $report);
    }
}
