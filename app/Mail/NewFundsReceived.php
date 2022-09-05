<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewFundsReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var float
     */
    private float $userBalance;

    /**
     * @var float
     */
    private float $amount;

    /**
     * Create a new message instance.
     *
     * @param float $userBalance
     * @param float $amount
     */
    public function __construct(float $userBalance, float $amount)
    {
        $this->userBalance = $userBalance;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_funds_received', [
            'amount' => $this->amount,
            'balance' => $this->userBalance
        ]);
    }
}
