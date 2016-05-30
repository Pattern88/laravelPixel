<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Popups\Popup;

class PopupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// !!! All existing roles are deleted !!!
		DB::table('popups')->truncate();
	    $user=User::where('email', 'danib8888@gmail.com')->firstOrFail();
		if (!is_null($user)){
			Popup::create([
				'url'     => 'http://homestead.app/tests/one',
				'popup_trigger'  => '5_second_after_load',
				'popup_location'  => 'top_right',
				'user_id' => $user->id
			]);
		}
    }
}
