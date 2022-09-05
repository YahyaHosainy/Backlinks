<?php

namespace App\Http\Livewire;

use App\Models\Extra;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ExtrasPriceTable
 * @package App\Http\Livewire
 */
class ExtrasPriceTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var array
     */
    protected $listeners = [
        'updateExtraServicePriceTable' => 'render'
    ];

    /**
     * @inheritDoc
     */
    public function query(): Builder
    {
        return auth()->user()->isAdmin() ? Extra::query() : Extra::query()->where('active', '=', 1);
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Code')
                ->searchable()
                ->sortable(),
            Column::make('Description', 'description')
                ->searchable()
                ->sortable(),
            Column::make('Price ($)', 'price_per_item')
                ->searchable()
                ->sortable(),
            Column::make('Status', 'active')
                ->searchable()
                ->sortable()
                ->format(function(Extra $model) {
                    return view('livewire.extra.includes.status-column', ['extra' => $model]);
                })
                ->hideIf(!auth()->user()->isAdmin()),
            Column::make('Actions')
                ->format(function(Extra $model) {
                    return view('livewire.extra.includes.actions', ['extra' => $model]);
                })
                ->hideIf(!auth()->user()->isAdmin()),
        ];
    }

    /**
     * Delete an extra service
     *
     * @param Extra $extra
     */
    public function deleteExtraService(Extra $extra)
    {
        $this->emit('deleteExtraService', $extra);
    }

    /**
     * Show the edit extra service modal
     *
     * @param Extra $extra
     */
    public function editExtraService(Extra $extra)
    {
        $this->emit('extraUpdateModalValues', $extra);
    }
}
