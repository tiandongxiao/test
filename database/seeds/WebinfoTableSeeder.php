<?php

use Illuminate\Database\Seeder;

class WebinfoTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('webinfo')->delete();
        
		\DB::table('webinfo')->insert(array (
			0 => 
			array (
				'admin_exist' => 0,
				'website_name' => 'E行动',
				'logo' => '',
			),
		));
	}

}
