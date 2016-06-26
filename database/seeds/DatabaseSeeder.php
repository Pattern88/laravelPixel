<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use vendor\laravel\framework\src\Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	 
    public function run()
    {
        Model::unguard();
        $this->call('UserSeederTable');
        $this->call('PopupSeederTable');
    }
}
