<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class FundsAdded
 * @package App\Mail
 */
class FundsAdded extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Payment|null
     */
    private ?Payment $payment;

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
        return $this->markdown('emails.funds_added', [
            'payment' => $this->payment
        ]);
    }
}
