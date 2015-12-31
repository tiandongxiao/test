<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('migrations')->delete();

		\DB::table('migrations')->insert(array (
			0 =>
			array (
				'migration' => '2014_10_12_000000_create_users_table',
				'batch' => 1,
			),
			1 =>
			array (
				'migration' => '2014_10_12_100000_create_password_resets_table',
				'batch' => 1,
			),
			2 =>
			array (
				'migration' => '2015_10_05_111055_create_profile_table',
				'batch' => 1,
			),
			3 =>
			array (
				'migration' => '2015_10_09_215409_entrust_setup_tables',
				'batch' => 1,
			),
			4 =>
			array (
				'migration' => '2015_10_13_085339_create_page_table',
				'batch' => 1,
			),
			5 =>
			array (
				'migration' => '2015_10_13_085550_create_article_table',
				'batch' => 1,
			),
			6 =>
			array (
				'migration' => '2015_10_23_161140_create_webinfo_table',
				'batch' => 1,
			),
			7 =>
			array (
				'migration' => '2015_10_31_211552_create_post_table',
				'batch' => 1,
			),
			8 =>
			array (
				'migration' => '2015_11_04_160952_create_blog_table',
				'batch' => 1,
			),
			9 =>
			array (
				'migration' => '2015_11_07_095935_create_email_actives_table',
				'batch' => 1,
			),
			10 =>
			array (
				'migration' => '2015_11_16_122039_create_jobs_table',
				'batch' => 1,
			),
			11 =>
			array (
				'migration' => '2015_11_20_165550_create_discussions_table',
				'batch' => 1,
			),
		));
	}

}
