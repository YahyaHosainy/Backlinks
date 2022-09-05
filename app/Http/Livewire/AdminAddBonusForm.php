<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DotEnvModification\DotEnvModification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Livewire\Component;

/**
 * Class AdminAddBonusForm
 * @package App\Http\Livewire
 */
class AdminAddBonusForm extends Component
{
    /**
     * @var
     */
    public $bonus;

    /**
     * @var array
     */
    protected $rules = [
        'bonus' => 'required|numeric|min:0'
    ];

    /**
     * AdminAddBonusForm constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->bonus = env('BONUS_AFTER_EMAIL_VERIFICATION');
    }

    /**
     * Save bonus into .env file
     */
    public function configureBonus()
    {
        // Validate user input data
        $this->validate();

        // Update the value of the input
        $env_updated = (new DotEnvModification())->changeEnv([
            'BONUS_AFTER_EMAIL_VERIFICATION' => $this->bonus
        ]);

        // Test if the modification are well done or not
        if ($env_updated) {
            session()->flash('bonus_settings_modified', 'The Bonus settings changed successfully !');
        } else {
            session()->flash('bonus_settings_not_modified', 'The Bonus settings not changed.');
        }
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.admin-add-bonus-form');
    }
}
