<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DotEnvModification\DotEnvModification;
use App\Jobs\SyncMailchimpAccounts;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use MailchimpMarketing\ApiClient;

/**
 * Class MailChimpApiForm
 * @package App\Http\Livewire
 */
class MailChimpApiForm extends Component
{
    /**
     * @var
     */
    public $apiKey;

    /**
     * @var
     */
    public $serverPrefix;

    /**
     * @var array
     */
    protected $rules = [
        'apiKey'=> 'required',
        'serverPrefix' => 'required'
    ];

    /**
     * Called while mounting the Livewire component
     */
    public function mount()
    {
        $this->apiKey = env('MAILCHIMP_API_KEY');
        $this->serverPrefix = env('MAILCHIMP_SERVER_PREFIX');
    }

    /**
     * Save new settings
     */
    public function saveApiSettings()
    {
        $this->validate();

        $env_updated = (new DotEnvModification())->changeEnv([
            'MAILCHIMP_API_KEY' => $this->apiKey,
            'MAILCHIMP_SERVER_PREFIX' => $this->serverPrefix
        ]);

        // Test if the modification are well done or not
        if ($env_updated) {
            session()->flash('mailchimp_settings_modified', 'The MailChimp API settings changed successfully !');
        } else {
            session()->flash('mailchimp_settings_not_modified', 'The MailChimp API settings not changed.');
        }
    }

    /**
     * Synchronize customers with Mailchimp API account
     */
    public function syncCustomers()
    {
        // Create a MailChimp client
        $client = new ApiClient();

        $client->setConfig([
            'apiKey' => env('MAILCHIMP_API_KEY'),
            'server' => env('MAILCHIMP_SERVER_PREFIX'),
        ]);

        // Sync DB customers with the  MailChimp customers list
        $clients = User::query()
            ->whereNotNull('email_verified_at')
            ->get();


        $model =array(
            'email_address' => '',
            'status' => '',
            'merge_fields' => array('FNAME' => ''));

        $grouped_data = array();

        foreach($clients as $user)
        {


            $model['email_address'] = $user->email;
            $model['status'] ="subscribed";
            $model['email_address'] = $user->email;
            $model['merge_fields']['FNAME'] = explode(" ", $user->name)[0];

            $grouped_data[]=array(
                'path' => 'lists/' . '3064c1db4e' . '/members',
                'method' => 'POST',
                'body' => json_encode($model)
            );
        
            
        }
        $attributes = array(
            'operations' => array(
                ...$grouped_data
            ));
        $response = $client->batches->start($attributes);
        // Show a success message after each synchronization operation
        session()->flash("contacts_synchronized",
            "All the customers are synchronized with your mailchimp account.
            It will take some time to be synchronized (1 MIN AT LEAST).");
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.mail-chimp-api-form');
    }
}
