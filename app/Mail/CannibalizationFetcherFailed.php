<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CannibalizationFetcherFailed extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $site;
    public $downloadLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $site)
    {
        $this->email = $email;
        $this->site = $site;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Cannibalization failed!')
            ->markdown('emails.cannibalization_fetcher_failed', [
                'email' => $this->email,
                'site' => $this->site,
            ]);
    }
}
