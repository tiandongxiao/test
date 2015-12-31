<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('posts')->delete();
        
		\DB::table('posts')->insert(array (
			0 => 
			array (
				'id' => 1,
				'user_id' => 1,
				'title' => 'title 1',
				'body' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'user_id' => 1,
				'title' => 'title 2',
				'body' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'user_id' => 1,
				'title' => 'title 3',
				'body' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 => 
			array (
				'id' => 4,
				'user_id' => 1,
				'title' => 'title 4',
				'body' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			4 => 
			array (
				'id' => 5,
				'user_id' => 1,
				'title' => 'title 5',
				'body' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			5 => 
			array (
				'id' => 6,
				'user_id' => 1,
				'title' => 'title 6',
				'body' => '我是小棉袄妈妈，夏天穿棉袄真热',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
