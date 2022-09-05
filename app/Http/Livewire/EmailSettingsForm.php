<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DotEnvModification\DotEnvModification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class EmailSettingsForm
 * @package App\Http\Livewire
 */
class EmailSettingsForm extends Component
{
    public $mail_mailer;
    public $mail_host;
    public $mail_port;
    public $mail_username;
    public $mail_password;
    public $mail_encryption;
    public $mail_token;
    public $mail_from_address;
    public $admin_mail;

    /**
     * @var DotEnvModification
     */
    private DotEnvModification $dotEnvModifcation;

    /**
     * EmailSettingsForm constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->dotEnvModifcation = new DotEnvModification();
    }

    /**
     * While mounting
     */
    public function mount()
    {
        $this->mail_mailer = env('MAIL_MAILER');
        $this->mail_host =  env('MAIL_HOST');
        $this->mail_port = env('MAIL_PORT');
        $this->mail_username = env('MAIL_USERNAME');
        $this->mail_password = env('MAIL_PASSWORD');
        $this->mail_encryption = env('MAIL_ENCRYPTION');
        $this->mail_token = env('POSTMARK_TOKEN');
        $this->mail_from_address = env('MAIL_FROM_ADDRESS');
        $this->admin_mail = env('ADMIN_EMAIL');
    }

    /**
     * Save Email Settings
     */
    public function saveChanges()
    {
        // Validate the user's values
        $this->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_token' => 'required',
            'mail_from_address' => 'required',
            'admin_mail' => 'required'
        ]);

        // save user's values
        $env_update = $this->dotEnvModifcation->changeEnv([
            'MAIL_MAILER' => $this->mail_mailer,
            'MAIL_HOST' => $this->mail_host,
            'MAIL_PORT' => $this->mail_port,
            'MAIL_USERNAME' => $this->mail_username,
            'MAIL_PASSWORD' => $this->mail_password,
            'MAIL_ENCRYPTION' => $this->mail_encryption,
            'POSTMARK_TOKEN' => $this->mail_token,
            'MAIL_FROM_ADDRESS' => $this->mail_from_address,
            'ADMIN_EMAIL' => $this->admin_mail
        ]);

        // Test if the modification are well done or not
        if ($env_update) {
            session()->flash('email_settings_saved', 'The Email settings changed successfully !');
        } else {
            session()->flash('email_settings_not_modified', 'The Email settings not changed.');
        }
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.email-settings-form');
    }
}
