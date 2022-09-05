<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ServicePriceTable
 * @package App\Http\Livewire
 */
class ServicePriceTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var array
     */
    protected $listeners = [
        'updateServicePriceTable' => 'render'
    ];

    /**
     * @inheritDoc
     */
    public function query(): Builder
    {
        return auth()->user()->isAdmin() ? Service::query() : Service::query()->where('active', '=', 1);
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Code')
                ->searchable()
                ->sortable()
                ->format(function(Service $model) {
                    return $this->html('<strong> <span class="bg-blue-500 p-1  text-sm">'.$model->code.'</span></strong>');
                }),
            Column::make('Description', 'description')
                ->searchable()
                ->sortable(),
            Column::make('Min. Qty', 'min_qte')
                ->searchable()
                ->sortable(),
            Column::make('Price Per Item ($)', 'price_per_item')
                ->searchable()
                ->sortable(),
            Column::make('Status', 'active')
                ->searchable()
                ->sortable()
                ->format(function(Service $model) {
                    return view('livewire.service.includes.status-column', ['service' => $model]);
                })
                ->hideIf(!auth()->user()->isAdmin()),
            Column::make('Is personal', 'is_personal')
                ->searchable()
                ->sortable()
                ->format(function(Service $model) {
                    return view('livewire.service.includes.is_personal_column', ['service' => $model]);
                })
                ->hideIf(!auth()->user()->isAdmin()),
            Column::make('Order')
                ->format(function(Service $model) {
                    return view('livewire.service-make-order-link');
                })
                ->hideIf(auth()->user()->isAdmin()==true),
            Column::make('Actions')
                ->format(function(Service $model) {
                    return view('livewire.service-actions', ['service' => $model]);
                })
                ->hideIf(!auth()->user()->isAdmin()),
        ];
    }

    /**
     * @param Service $service
     */
    public function deleteService(Service $service)
    {
        $this->emit('deleteService', $service);
    }

    /**
     * Show the edit service modal
     *
     * @param Service $service
     */
    public function editService(Service $service)
    {
        $this->emit('updateModalValues', $service);
    }
}
