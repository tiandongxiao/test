<?php namespace App\Seeder;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('permissions')->delete();
        
		\DB::table('permissions')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'page_create',
				'display_name' => '页面创建',
				'description' => '非匿名用户拥有页面创建权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'page_edit',
				'display_name' => '页面编辑',
				'description' => '本人及管理员拥有页面编辑权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'page_delete',
				'display_name' => '页面删除',
				'description' => '本人及管理员拥有页面删除权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'blog_create',
				'display_name' => '微博创建',
				'description' => '非匿名用户拥有页面创建权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			4 => 
			array (
				'id' => 5,
				'name' => 'blog_edit',
				'display_name' => '微博编辑',
				'description' => '本人及管理员拥有页面编辑权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			5 => 
			array (
				'id' => 6,
				'name' => 'blog_delete',
				'display_name' => '微博删除',
				'description' => '本人及管理员拥有页面删除权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
