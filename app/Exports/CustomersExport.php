<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Class CustomersExport
 * @package App\Exports
 */
class CustomersExport implements FromCollection, WithHeadings
{
    /**
     * @var
     */
    private $customers;

    /**
     * CustomersExport constructor.
     * @param $customers
     */
    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    /**
    * @return Collection
    */
    public function collection()
    {
        return $this->customers;
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            'id',
            'is_admin',
            'active',
            'name',
            'balance',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ];
    }
}
