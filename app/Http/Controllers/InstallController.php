<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = \Config::get('website.has_admin');

        return view('install.index')->withErrors($result);
         if(!\Config::get('website.has_admin')){
             return view('install.index');
         }else{
             //abort(404);
             echo 'lala';
         }
    }

    public function getAdminConfig(){
        \Config::set('website.has_admin',true);
        $value = \Config::get('website.has_admin');
        echo $value;
        //return view('install.admin_config');
    } 

    public function postAdminConfig(Request $request){
        $phone = \Request::input('phone');
        $password = \Request::input('password');
        $password_confirm = \Request::input('password_confirmation');
        $email = \Request::input('email');
        
        $userInfo = array(
            'phone'                 => $phone,
            'password'              => $password,
            'password_confirmation' => $password_confirm,
            'email'                 =>$email
        );
        
        $validator = Validator::make($userInfo, ValidRule::$phone_reg_rules,ValidRule::$phone_reg_tips);

        if($validator->passes()){            
            $user = new User();
            $user->phone = $phone;
            $user->email = $email;
            $user->password = \Hash::make($password);

            if($user->save()){
                return \Redirect::to('login')->withErrors('恭喜您注册成功!'); 
            }else{
                return \Redirect::to('register')->withErrors('注册失败，请再试一次');
            }

        }else{
            return \Redirect::to('register')->withErrors($validator);
        }
    } 
}
