<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CannibalizationFetcherMails extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $site;
    public $xlsxFilePath;
    public $filename;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $site, string $xlsxFilePath, string $filename)
    {
        $this->email = $email;
        $this->site = $site;
        $this->xlsxFilePath = $xlsxFilePath;
        $this->filename = $filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Download The Results of Cannibalization')
            ->markdown('emails.cannibalization_fetcher_mail', [
                'email' => $this->email,
                'site' => $this->site,
            ])
            ->attach($this->xlsxFilePath, [
                'as' => $this->filename,
                'mime' => 'application/vnd.ms-excel',
            ]);
    }
}
