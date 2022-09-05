<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'is_admin' => true,
                'active' => true,
                'name' => 'Yahya Hosainy',
                'balance' => 10,
                'email' => 'yahyayakta@gmail.com',
                'email_verified_at' => '2022-2-3 9:57',
                'password' => Hash::make('password')
            ]
        ]);
    }
}
