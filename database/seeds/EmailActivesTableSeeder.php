<?php

use Illuminate\Database\Seeder;

class EmailActivesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('email_actives')->delete();
        
	}

}
