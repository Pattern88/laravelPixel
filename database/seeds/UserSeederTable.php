<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // !!! All existing users are deleted !!!
       DB::table('users')->truncate();
		
       User::create([
            'email'     => 'danib8888@gmail.com',
            'name'  => 'Dani',
            'password'  => Hash::make('password')
       ]);
    }
}
