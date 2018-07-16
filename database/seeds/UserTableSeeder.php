<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'remember_token' => '2'
        ));
    }

}