<?php

namespace App\Http\Livewire;

use App\Models\GTMConfig;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class GtmSettingsForm
 * @package App\Http\Livewire
 */
class GtmSettingsForm extends Component
{
    public $headCode;
    public $bodyCode;
    public ?GTMConfig $gtmConfig;

    protected $rules = [
      'headCode' => 'required',
      'bodyCode' => 'required'
    ];

    /**
     * GtmSettingsForm constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        // Load GTM settings from DB if available
        $this->gtmConfig = GTMConfig::first();

        parent::__construct($id);
    }

    /**
     * Mounting event
     */
    public function mount()
    {
        if ($this->gtmConfig != null) {
            $this->headCode = $this->gtmConfig->headPart;
            $this->bodyCode = $this->gtmConfig->bodyPart;
        } else {
            $this->headCode = "";
            $this->bodyCode = "";
        }
    }

    /**
     * Save new GTM Settings
     */
    public function saveChanges()
    {
        // Validate user data
        $this->validate();

        // Check if there is any previous GTM Settings
        if ($this->gtmConfig != null) {
            $this->gtmConfig->headPart = $this->headCode;
            $this->gtmConfig->bodyPart = $this->bodyCode;
            $this->gtmConfig->save();
        } else {
            $gtm = new GTMConfig();
            $gtm->headPart = $this->headCode;
            $gtm->bodyPart = $this->bodyCode;
            $gtm->save();
        }

        session()->flash("success" , "New GTM Setting are saved successfully !");
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.gtm-settings-form');
    }
}
