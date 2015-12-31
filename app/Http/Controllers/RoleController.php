<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index')->with('roles',Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role();        
        $role->name         = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->description  = $request->get('description');
        $res = $role->save();
        if($res){
            return \Redirect::to('role');
        }else{
            return \Redirect::to('/')->withInput()->withErrors('创建失败');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('role.show')->with('role',Role::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('role.edit')->with('role',Role::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:pages,title,'.$id.'|max:255',
            'display_name' =>'required',
            'description' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->description = $request->get('description');

        if ($role->save()) {
            return \Redirect::to('role');
        } else {
            return \Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $res = $role->delete();
        if($res){
            return \Redirect::to('role');
        }else{
            return \Redirect::to('/')->withErrors('角色删除失败');
        }
    }
}
