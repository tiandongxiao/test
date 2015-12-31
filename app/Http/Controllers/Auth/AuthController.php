<?php

namespace App\Http\Controllers\Auth;

use App\ValidRule;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;



class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = 'dashboard';
    protected $loginPath = '/login';   

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      =>  isset($data['name'])?$data['name']:null,
            'phone'     =>  isset($data['phone'])?$data['phone']:null,
            'email'     =>  isset($data['email'])?$data['email']:null,
            'active'    =>  $data['active'],
            'password'  =>  bcrypt($data['password'])
        ]);
    }

    /**
     * 手机号码用户登陆处理逻辑
     *
     * @param  null
     * @param  null
     * @return view
     */
    public function postLogin(Request $request)
    {
        $userInfo = array(
            'phone'    => $request->get('phone'),
            'password' => $request->get('password')
        );
        
        $validator = ValidRule::validator($userInfo,'phone_login');
        if($validator->passes())
        {
            if(Auth::attempt(array('phone' => $userInfo['phone'], 'password' => $userInfo['password']))){
                return redirect()->intended('/');
            }else{
                return redirect('login')->withErrors('账号密码有误');
            }
        }else{
            return redirect('login')->withErrors($validator);
        }        
    }

    /**
     * 获得手机号码方式注册用户界面
     *
     * @return view
     */
    public function getPhoneRegister()
    {
        return view('auth.phone_register');
    } 

    /**
     * 手机号码方式注册用户处理逻辑
     *
     * @param  $request
     * @return view
     */
    public function postPhoneRegister(Request $request)
    {
        $userInfo = array(
            'phone'                 => $request->get('phone'),
            'password'              => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
            'vcode'                 => $request->get('vcode')
        );

        $validator = ValidRule::validator($userInfo,'phone_reg');

        if($validator->passes())
        {
            if(Cache::has($userInfo['phone']))
            {
                $key = Cache::get($userInfo['phone']);
                if($userInfo['vcode'] != $key){
                    return redirect('register')->withErrors('验证码不正确');
                }
            }else{
                return redirect('register')->withErrors('验证码已过期');
            }

            $userInfo['active'] = true;

            if($this->create($userInfo)){
                return redirect('login')->withErrors('恭喜您注册成功!');
            }else{
                return redirect('register')->withErrors('注册失败，请再试一次');
            }
        }else{
            return redirect('register')->withErrors($validator);
        }
    }

    /**
     * 返回Email方式用户登陆界面
     *
     * @param  null
     * @return view
     */
    public function getEmailLogin()
    {
        return view('auth.email_login');
    }

    /**
     * Email方式用户登陆处理逻辑
     *
     * @param  null
     * @return view
     */
    public function postEmailLogin(Request $request)
    {
        $userInfo = array(
            'email'    => $request->get('email'),
            'password' => $request->get('password')
        );

        $validator = ValidRule::validator($userInfo,'email_login');

        if($validator->passes())
        {
            if(\Auth::attempt(array('email' => $userInfo['email'], 'password' => $userInfo['password']))){
                return redirect('/');
            }else{
                return redirect('login/email')->withErrors('账号密码有误');
            }
        }else{
            return redirect('login/email')->withErrors($validator);
        }        
    } 

    /**
     * 返回Email用户注册界面
     *
     * @param  null
     * @return view
     */
    public function getEmailRegister()
    {
        return view('auth.email_regist');
    } 

    /**
     * Email方式注册用户处理逻辑
     *
     * @param  null
     * @return view
     */
    public function postEmailRegister(Request $request)
    {
        $userInfo = array(
            'email'                 => $request->get('email'),
            'password'              => $request->get('password'),
            'password_confirmation' => $request->get('password_confirmation'),
            'cpt'                   => $request->get('cpt')
        );

        $validator = ValidRule::validator($userInfo,'email_reg');

        if($validator->passes())
        {
            $userInfo['active'] = false;
            $user = $this->create($userInfo);
            if(is_object($user))
            {
                $this->sendActivatedMail($user);
                return redirect('login/email')->withErrors('恭喜您注册成功!请先去邮箱进行激活');
            }else{
                return redirect('register/email')->withErrors('注册失败，请再试一次');
            }
        }else{
            return redirect('register/email')->withErrors($validator);
        }
    }

    public function getActiveEmail($token = null)
    {
        if($token)
        {
            //检查表中是否有数据
            $info = DB::table('email_actives')->where('token',$token)->first();
            if(is_object($info)){
                $user = User::where('email',$info->email)->first();
                $user->active = true;
                if($user->save()){
                    DB::table('email_actives')->where('token',$token)->delete(); // 删除此条存储记录
                    Auth::login($user);
                    return redirect('/')->withErrors('邮箱已激活并为您登录');
                }else{
                    return redirect('/')->withErrors('不知道哪里出问题了，没有激活成功');
                }
            }else{
                //已过激活失效期，是否重新发射激活邮件
                return redirect('/')->withErrors('验证信息已过期');
            }
        }
    }

    private function sendActivatedMail($user)
    {
        $data = array(
            array(
                'email'   => $user->email,
                'token'   => Str::random(60),
            )
        );
        $info = $data[0];
        $result = DB::table('email_actives')->insert($data);
        if($result){
            $info = $data[0];
            Mail::send('email.active', ['token' => $info['token'] ], function ($m) use ($user) {
                $m->to($user->email)->subject('E行动用户激活');
            });
        }
    }
}
