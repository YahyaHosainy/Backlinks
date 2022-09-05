<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class CustomersTable
 * @package App\Http\Livewire
 */
class CustomersTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var array
     */
    public $perPageOptions = [100, 500];

    /**
     * @var array
     */
    protected $listeners = [
        'updateCustomersTable' => 'render'
    ];

    /**
     * @inheritDoc
     */
    public function query(): Builder
    {
        return User::query();
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make('Full name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Email')
                ->searchable()
                ->sortable(),
            Column::make('Status', 'active')
                ->format(function(User $model) {
                    return view('livewire.customers.includes.status-column', ['user' => $model]);
                }),
            Column::make('Email verified', 'email_verified_at')
                ->format(function(User $model) {
                    return view('livewire.customers.includes.email-status-column', ['user' => $model]);
                }),
            Column::make('Date of Creation', 'created_at')
            ->sortable()
            ->searchable(),
            Column::make('Balance')
            ->format(function(User $model) {
                return $this->html('<span> $'.(number_format($model->balance,2)).'</span>');
            })
            ->searchable()
            ->sortable(),
            Column::make('Actions')
                ->format(function(User $model) {
                    return view('livewire.customers-actions', ['user' => $model]);
                })
                ->hideIf(!auth()->user()->isAdmin()),
        ];
    }

    /**
     * @param User $user
     */
    public function deleteCustomer(User $user)
    {
        $this->emit('deleteCustomer', $user);
    }

    /**
     * Show the edit customer modal
     *
     * @param User $customer
     */
    public function editCustomer(User $customer)
    {
        $this->emit('updateCustomerModalValues', $customer);
    }
}
