<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class OrderCompleted
 * @package App\Mail
 */
class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Report|null
     */
    private ?Report $report;

    /**
     * Create a new message instance.
     *
     * @param Report $report
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order_completed', [
            'report' => $this->report
        ]);
    }
}
