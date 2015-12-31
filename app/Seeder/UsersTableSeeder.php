<?php namespace App\Seeder;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->delete();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'admin',
				'phone' => '15001151192',
				'email' => '15001151192@exingdong.com',
				'password' => '$2y$10$gZKIYVVx9h59tjIv0zjlu.2lWPOLOS6ed0.0nvRVNTT2j66penwBW',
				'avatar' => '/uploads/1_1448244033_c8177f3e6709c93d5852aa299a3df8dcd000544f.jpg',
				'slogan' => '我是管理员，我是上帝',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2015-11-23 10:00:34',
			),
			1 => 
			array (
				'id' => 2,
				'name' => '18511892531',
				'phone' => '18511892531',
				'email' => '18511892531@exingdong.com',
				'password' => '$2y$10$M9YhTexNPsVnwewngZF5LOTEU0NBf/F0BwObylDTZaBmMPeHjgDV.',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'name' => '18511892532',
				'phone' => '18511892532',
				'email' => '18511892532@exingdong.com',
				'password' => '$2y$10$j/Fv0qLqhKzNdIOFE82/N.yBcvl8XscWkvTmDsCwBpqxvmjNHhiGi',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
