<?php

namespace App\Console\Commands;
use App\Models\User;
use DateTime;
use Illuminate\Console\Command;

class deleteUnactiveCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:unactiveCustomers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $threeDaysBefore = (new DateTime())->modify('-3 day')->format('Y-m-d');
        
        $unactiveUsers = User::where(function ($query) {
            $query->whereNull('email_verified_at')
            ->orWhere('email_verified_at','=','0000-00-00 00:00:00');
        })->Where(function ($query) use ($threeDaysBefore) {
            $query->whereDate('created_at', '<', $threeDaysBefore)
            ->where('active',0);
        })->get();

        foreach ($unactiveUsers as $key => $unactiveUser) {
            $unactiveUser->delete();
        }
        return 0;
    }
}
