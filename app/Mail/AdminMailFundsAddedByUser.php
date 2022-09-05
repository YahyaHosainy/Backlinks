<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMailFundsAddedByUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Payment
     */
    private Payment $payment;

    /**
     * Create a new message instance.
     *
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.funds_added_by_user', [
            'payment' => $this->payment
        ]);
    }
}
