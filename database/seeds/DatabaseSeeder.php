<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('DiscussionsTableSeeder');
		$this->call('ArticlesTableSeeder');
		$this->call('BlogsTableSeeder');
		$this->call('EmailActivesTableSeeder');
		$this->call('JobsTableSeeder');
		$this->call('MigrationsTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('PasswordResetsTableSeeder');
		$this->call('PermissionRoleTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('ProfilesTableSeeder');
		$this->call('RoleUserTableSeeder');
		$this->call('WebinfoTableSeeder');
		Model::reguard();
	}
}
