<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Traits\ERoleTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use DB;

class UserController extends Controller
{
    use ERoleTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 创建用户
        $user = new User();
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        if($user->save()){
            return redirect('user');
        }else{
            return redirect()->back()->withInput()->withErrors('创建失败');
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
        return view('user.show')->with('user',User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'user'  => User::find($id),
            'roles' => Role::all()
        );

        return view('user.edit')->with('data',$data);
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
        // 创建用户
        $user = User::find($id);
        $info = $request->get('role');

        if($user->save()){
            $this->setUserRoles($user,$info);
            return redirect('user');
        }else{
            return redirect()->back()->withInput()->withErrors('创建失败');
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
        $user = User::find($id);

        if($user->delete()){
            return redirect('user');
        }else{
            return redirect('user')->withErrors('用户'.$user->name.'账号删除失败');
        }
    }

    public function getAvatar()
    {
        return view('user.avatar');
    }

    public function postAvatar(Request $request)
    {
        $file = $request->file('avatar');
        if($file){
            $destPath = "uploads/";
            $filename = Auth::user()->id.'_'.time().'_'.$file->getClientOriginalName();
            $file->move($destPath,$filename);
            Image::make($destPath.$filename)->fit(200)->save();
            $user = Auth::user();
            $user->avatar = '/'.$destPath.$filename;
            $user->save();
            return redirect('user/avatar');
        }else{
            return redirect('user/avatar')->withErrors('骚年，莫羞涩，上传你的靓照吧');
        }
    }

    public function ajaxAvatar(Request $request)
    {
        $file = $request->file('avatar');

        if($file)
        {
            $destPath = "uploads/";
            $filename = Auth::user()->id.'_'.time().'_'.$file->getClientOriginalName();
            $file->move($destPath,$filename);
            Image::make($destPath.$filename)->fit(200)->save();
            $user = Auth::user();
            $user->avatar = '/'.$destPath.$filename;
            $user->save();
            return Response::json([
                'success' => true,
                'avatar'  =>asset($destPath.$filename)
            ]);
        }else{
            return Response::json([
                'success' => false
            ]);
        }
    }
}
