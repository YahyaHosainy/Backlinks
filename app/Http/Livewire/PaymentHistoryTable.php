<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class PaymentHistoryTable
 * @package App\Http\Livewire
 */
class PaymentHistoryTable extends TableComponent
{
    /**
     * @inheritDoc
     */
    public function query(): Builder
    {
        if (auth()->user()->is_admin) {
            return Payment::query()->orderBy('created_at', 'desc');
        }

        return Payment::query()->where('user_id', auth()->user()->id);
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Payment Method', 'payment_method')
                ->searchable()
                ->sortable(),
            Column::make('Transaction ID', 'payment_id')
                ->sortable(),
            Column::make('Amount')
                ->searchable()
                ->sortable(),
            Column::make('Date and Time', 'created_at')
                ->searchable()
                ->sortable(),
            Column::make('Customer Name', 'user.name')
                ->hideIf(auth()->user()->is_admin == 0)
                ->searchable()
                ->format(function(Payment $model) {
                    return view('livewire.payment-history.includes.customer-name', ['payment' => $model]);
                }),
            Column::make('Invoice', 'receipt_url')
                ->searchable()
                ->sortable()
                ->hideIf(auth()->user()->is_admin == 1)
                ->format(function(Payment $model) {
                    return view('livewire.payment-history.includes.receipt-url-column', ['payment' => $model]);
                })
        ];
    }
}
