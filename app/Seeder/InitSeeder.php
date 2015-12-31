<?php
/**
 * Created by PhpStorm.
 * User: sanmingzhi
 * Date: 2015/11/27
 * Time: 15:31
 */

namespace App\Seeder;

class InitSeeder
{

    public function run()
    {
        $users = new UsersTableSeeder();
        $users->run();

        $roles = new RolesTableSeeder();
        $roles->run();

        $permissions = new PermissionsTableSeeder();
        $permissions->run();
    }
}