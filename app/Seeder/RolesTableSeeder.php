<?php namespace App\Seeder;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('roles')->delete();
        
		\DB::table('roles')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'admin',
				'display_name' => '超级管理员',
				'description' => '超级管理员拥有系统所有操作权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'anony_user',
				'display_name' => '匿名用户',
				'description' => '匿名用户只拥有非敏感信息的查看权限和部分评论权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'regist_user',
				'display_name' => '注册用户',
				'description' => '注册用户可修改本人所有相关资料，查看非付费项目的权限',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'payment_user',
				'display_name' => '付费用户',
				'description' => '付费用户可以享有所有付费服务',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
