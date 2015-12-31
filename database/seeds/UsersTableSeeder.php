<?php

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
				'password' => '$2y$10$vmVO3lpS/F/w5zrPqZsK7O4R4FU3HCHU7ULwY1LpuNCqT8IJahUVW',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是管理员，我是上帝',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'name' => '18511892531',
				'phone' => '18511892531',
				'email' => '18511892531@exingdong.com',
				'password' => '$2y$10$N2Pk1KU1FSiGb35p/j/bxu926kiIAgl01lubHK6qHHKPoQ8zvBusq',
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
				'password' => '$2y$10$36qM4J095.jBZeMUWoJyy.0q85Lh5w.9UzVIc90JaxcA12kx0aLNK',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 => 
			array (
				'id' => 4,
				'name' => '18511892533',
				'phone' => '18511892533',
				'email' => '18511892533@exingdong.com',
				'password' => '$2y$10$Pjo8/qQpMdY0oVR2X7tIEud6f4CeFrTLefqd5tXFi3TjLy2fmhHU6',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			4 => 
			array (
				'id' => 5,
				'name' => '18511892534',
				'phone' => '18511892534',
				'email' => '18511892534@exingdong.com',
				'password' => '$2y$10$NWdwIsDNh9V57FenKiAiAu0oIyug7Mz1uCwDiF84RPk05LK4v5uRC',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			5 => 
			array (
				'id' => 6,
				'name' => '18511892535',
				'phone' => '18511892535',
				'email' => '18511892535@exingdong.com',
				'password' => '$2y$10$VaRo6h07qjTJ19AFTcepaOPYjL85OJbJLhAJAYdX84xwIV52j8K7G',
				'avatar' => 'http://pic.qqtn.com/file/2013/2014-5/2014052709421662013.gif',
				'slogan' => '我是小棉袄，就算是夏天，你也得穿',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			6 => 
			array (
				'id' => 7,
				'name' => '18511892536',
				'phone' => '18511892536',
				'email' => '18511892536@exingdong.com',
				'password' => '$2y$10$Q4aVjLb1hrdSI4KYQ0V8wOrQSxIJk.vlot7.kuzljZHbOQakHD8Ka',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			7 => 
			array (
				'id' => 8,
				'name' => '18511892537',
				'phone' => '18511892537',
				'email' => '18511892537@exingdong.com',
				'password' => '$2y$10$5qwXekZF1v.f0TLJnbT4HOkbQw4ovhFfG5Uz0i3doXeLlMIt7R05a',
				'avatar' => 'http://imgsrc.baidu.com/forum/w%3D580/sign=d5317482b6003af34dbadc680528c619/2164cff81a4c510f3a1b76916059252dd52aa57b.jpg',
				'slogan' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'active' => 1,
				'remember_token' => NULL,
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			8 => 
			array (
				'id' => 9,
				'name' => '18511892538',
				'phone' => '18511892538',
				'email' => '18511892538@exingdong.com',
				'password' => '$2y$10$U2KQGookcgg2MrcQiIWFAeybYdiGzAAIfOdaKgQE8tWnKBaH85eVi',
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
