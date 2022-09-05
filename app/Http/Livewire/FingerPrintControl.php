<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Http\Livewire\DotEnvModification\DotEnvModification;

/**
 * Class AdminAddFunds
 * @package App\Http\Livewire
 */
class FingerPrintControl extends Component
{
    public $isFingerPrintEnabled;
    private $dotEnvModifcation;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->dotEnvModifcation = new DotEnvModification();
        $this->isFingerPrintEnabled = env('IS_FINGERPRINT_ENABLED');
    }

    
    public function saveFingerPrintStatus()
    {
        $env_updated = $this->dotEnvModifcation->changeEnv([
            'IS_FINGERPRINT_ENABLED' => $this->isFingerPrintEnabled
        ]);
        if($env_updated){
            session()->flash('success', 'Status changed successfully ! ');
        } else {
            session()->flash('error', 'Something went wrong, Status did not change !');
        }

    }
     
    
    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.finger-print-control');
    }
}