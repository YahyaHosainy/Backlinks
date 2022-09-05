<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use DateTime;

/**
 * Class AdminAddFunds
 * @package App\Http\Livewire
 */
class CleanCustomersList extends Component
{


    
    public function cleanCustomersList()
    {
        $threeDaysBefore = (new DateTime())->modify('-3 day')->format('Y-m-d');

        $unactiveUsers1 = User::
        whereNull('email_verified_at')
        ->whereDate('created_at', '<', $threeDaysBefore)
        ->get();


        $len = count($unactiveUsers1);

        foreach ($unactiveUsers1 as $key => $unactiveUser) {
            
            $unactiveUser->active=0;
            $unactiveUser->update();
            $unactiveUser->delete();
        }
        
        session()->flash('customers_deleted', $len);

    }
     
    public function restoreCustomersDeleted()
    {
       
        
        $deletedUsers = 
        User::withTrashed()->whereNotNull('deleted_at')
        ->get();
        $len = 0;

        foreach ($deletedUsers as $key => $deletedUser) {
            $deletedUser->deleted_at = NULL;
            $deletedUser->update();
            $len++;
        }
        session()->flash('customers_restored', $len);
    }
    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.clean-customers-list');
    }
}
