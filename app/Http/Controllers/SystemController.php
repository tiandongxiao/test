<?php

namespace App\Http\Controllers;

use Faker\Generator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Seeder\InitSeeder;
use DB;
use Orangehill\Iseed\Facades\Iseed;
use Illuminate\Support\Facades\Artisan;
use App\Permission;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 初始化数据库数据，注入地基式框架数据，作为其他数据构建基础
     */
    public function initDataInsert()
    {
        $seeder = new InitSeeder();
        $seeder->run();
    }

    /**
     * 对数据库数据进行Iseed备份
     */
    public function dbBackup()
    {
        $tables = [];

        foreach(DB::select('SHOW TABLES') as $key => $value){
            $table_name =  array_values((array)$value)[0];
            array_push($tables,$table_name);
        }

        if (count($tables)) {
            foreach ($tables as $tableName) {
                Iseed::generateSeed($tableName);
            }
        }
        echo '数据库备份种子已生成';
    }

    /**
     * 使用Iseed备份进行数据恢复
     */
    public function dbRecovery()
    {
        $exitCode = Artisan::call('migrate:refresh',['--seed' => true]);
        if($exitCode==0){
            echo '数据库恢复成功';
        }
    }

    /**
     * 使用Iseed备份进行数据恢复
     */
    public function dbClear()
    {
        $exitCode = Artisan::call('migrate:refresh');
        if($exitCode==0){
            echo '数据表数据已清空';
        }

    }
    /**
     * 显示phpinfo相关信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function phpinfo()
    {
        return view('system.phpinfo');
    }

    /**
     * 根据传入的参数创建Model、schma数据表和Controller
     * @param $model model名称
     */
    public function mcMaker($model = null)
    {
        $model = ucfirst(trim($model));
        $exitCode = Artisan::call('make:model',[ 'name'=>$model ,'-m' => true]);
        if($exitCode == 0){
            echo '数据模型和数据表创建成功';
            $exitCode = Artisan::call('make:controller',[ 'name'=> $model.'Controller' ]);
            if($exitCode == 0){
                echo '控制器创建成功';
                $exitCode = Artisan::call('migrate');
                $this->createModelPermissions($model);
            }else{
                echo '控制器创建失败';
            }
        }else{
            echo '数据模型和数据表创建失败';
        }
        return redirect('permission');
    }

    public function createModelPermissions($model)
    {
        $permissions = ['create'=>'添加','delete'=>'删除','modify'=>'修改','view'=>'查看'];

        foreach($permissions as $key=>$value){
            $perm = new Permission();
            $perm->name         = $model.'_'.$key;
            $perm->display_name = $model.' '.$value;
            $perm->description  = '此权限允许用户对'.$model.'进行'.$value;
            $res = $perm->save();
        }
    }

    public function dataFaker($model,Generator $faker)
    {
        $model = ucfirst(trim($model));
        $class_name = "App\\".$model;
        $instance = new $class_name();
        dd($instance);
    }
}
