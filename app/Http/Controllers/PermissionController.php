<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\Traits\EPermissionTrait;

class PermissionController extends Controller
{
    use EPermissionTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permission.index')->with('permissions',Permission::all())->with('roles',Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perm = new Permission();        
        $perm->name         = $request->get('name');
        $perm->display_name = $request->get('display_name');
        $perm->description  = $request->get('description');
        $res = $perm->save();
        if($res){
            $this->authToAdmin($perm);
            $this->authToPaymentUser($perm);
            $this->authToRegistUser($perm);
            return \Redirect::to('permission');
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
        return view('permission.show')->with('permission',Permission::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('permission.edit')
            ->with('permission',Permission::find($id))
            ->with('roles',Role::all());
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

        $perm = Permission::find($id);
        $perm->name = $request->get('name');
        $perm->display_name = $request->get('display_name');
        $perm->description = $request->get('description');
        $role_array = $request->get('role');

        if ($perm->save()) {
            $this->authPermisson($perm,$role_array);             
            return \Redirect::to('permission');
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
        $permission = Permission::find($id);
        $res = $permission->delete();
        if($res){
            return \Redirect::to('permission');
        }else{
            return \Redirect::to('/')->withErrors('权限删除失败');
        }
    }
}
