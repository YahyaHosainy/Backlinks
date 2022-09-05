<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsExport implements FromCollection, WithHeadings
{
    /**
     * @var
     */
    private $payments;

    /**
     * PaymentsExport constructor.
     * @param $payments
     */
    public function __construct($payments)
    {
        $this->payments = $payments;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->payments;
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'payment_id',
            'payer_id',
            'amount',
            'currency',
            'card_type',
            'last4',
            'payment_method',
            'payment_status',
            'receipt_url',
            'paypal_email',
            'created_at',
            'updated_at'
        ];
    }
}
