<?php

namespace App\Http\Livewire;

use App\Http\Livewire\DotEnvModification\DotEnvModification;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class AddBonusAfterAddingFunds
 * @package App\Http\Livewire
 */
class AddBonusAfterAddingFunds extends Component
{
    /**
     * @var float
     */
    public $bonus = 0;

    /**
     * @var float
     */
    public $funds = 0;

    /**
     * @var array
     */
    protected $rules = [
        'bonus' => 'required|numeric|min:0',
        'funds' => 'required|numeric|min:0'
    ];

    /**
     * AddBonusAfterAddingFunds constructor.
     * @param $id
     */
    public function __construct($id)
    {
        parent::__construct($id);
        $this->bonus = env('BONUS_FUNDS_GREATER_THAN_ONE_HUNDRED');
        $this->funds = env('BONUS_FUNDS_VALUE');
    }

    /**
     * Add bonus for all customers if they passed 100$ as funds
     */
    public function addBonus()
    {
        // Validate user input
        $this->validate();

        // Update bonus value in .env file
        $env_updated = (new DotEnvModification())->changeEnv([
            'BONUS_FUNDS_GREATER_THAN_ONE_HUNDRED' => $this->bonus,
            'BONUS_FUNDS_VALUE' => $this->funds
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
        return view('livewire.add-bonus-after-adding-funds');
    }
}
