<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class PaymentMethodsTable
 * @package App\Http\Livewire
 */
class PaymentMethodsTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @inheritDoc
     */
    public function query(): Builder
    {
        if (auth()->user()->is_admin) {
            return Payment::query();
        }

        return Payment::query()->where('user_id', auth()->user()->id);
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Amount')
                ->searchable()
                ->sortable(),
            Column::make('Payment Method', 'payment_method')
                ->searchable()
                ->sortable(),
            Column::make('Paypal Email', 'paypal_email')
                ->searchable()
                ->sortable()
                ->format(function(Payment $model) {
                    return view('livewire.payment-methods.includes.paypal-email', ['payment' => $model]);
                }),
            Column::make('Card', 'last4')
                ->searchable()
                ->sortable()
                ->format(function(Payment $model) {
                    return view('livewire.payment-methods.includes.card', ['payment' => $model]);
                }),
            Column::make('Date Of Payment', 'created_at')
                ->searchable()
                ->sortable(),
        ];
    }
}
