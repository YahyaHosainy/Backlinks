<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

/**
 * Class PeriodicJobsController
 * @package App\Http\Controllers
 */
class PeriodicJobsController extends Controller
{
    
    public function deleteUnactiveCustomers()
    {
        $threeDaysBefore = (new DateTime())->modify('-3 day')->format('Y-m-d');
        

        // $unactiveUsers = User::where(function ($query) {
        //     $query->whereNull('email_verified_at')
        //     ->orWhere('email_verified_at','=','0000-00-00 00:00:00');
        // })->Where(function ($query) use ($threeDaysBefore) {
        //     $query->whereDate('created_at', '<', $threeDaysBefore)
        //     ->where('active',0);
        // })->get();

        $unactiveUsers1 = User::
        whereNull('email_verified_at')
        ->where('active',0)
        ->whereDate('created_at', '<', $threeDaysBefore)
        ->get();

        $unactiveUsers2 = User::
        Where('email_verified_at','=','0000-00-00 00:00:00')
        ->where('active',0)
        ->whereDate('created_at', '<', $threeDaysBefore)
        ->get();
        $len = count($unactiveUsers1)+count($unactiveUsers2);

        foreach ($unactiveUsers1 as $key => $unactiveUser) {
            $unactiveUser->delete();
        }
        
        foreach ($unactiveUsers2 as $key => $unactiveUser) {
            $unactiveUser->delete();
        }
        echo($len);
    }
    public function restoreDeletedCustomers()
    {
        User::withTrashed()->whereNotNull('deleted_at')->update([
            'deleted_at' => null
        ]);
        
        $deletedUsers = 
        User::withTrashed()->where('deleted_at')
        ->get();

        foreach ($deletedUsers as $key => $deletedUser) {
            $deletedUser->deleted_at = NULL;
            $deletedUser->update();
        }
        echo(count($deletedUsers));
    }
        


 
        
}
