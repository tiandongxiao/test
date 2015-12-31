<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getAdmin()
    {
        return view('admin.index');
    }

    public function getTest($value='')
    {
 		$data['tasks'] = [
            [
                    'name' => '设计新的导航条',
                    'progress' => '87',
                    'color' => 'danger'
            ],
            [
                    'name' => '创建新的主页',
                    'progress' => '76',
                    'color' => 'warning'
            ],
            [
                    'name' => '其他任务',
                    'progress' => '32',
                    'color' => 'success'
            ],
            [
                    'name' => '开始构建网站',
                    'progress' => '56',
                    'color' => 'info'
            ],
            [
                    'name' => '开发一个炫酷算法',
                    'progress' => '10',
                    'color' => 'success'
            ]
        ];
        return view('admin.test')->with($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCalendar()
    {
    	return view('admin.calendar');
    }

}
