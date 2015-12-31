<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Cache;

class ToolController extends Controller
{
    /**
     * 发送随机短信验证码
     *
     * @param  null
     * @return null
     */
    public function sendVerifySMS(Request $request)
    {      $phone = $request->get('phone');
        $code = $this->randString(4,'NUMBER');

        $result = \RongLian::sendSMS($phone,array($code,'30'),'1');

        if($result){
            Cache::put($phone, $code, 1);
            return response()->json(['code' => 200, 'info' => '验证短信发送成功']);
        }else{
            return response()->json(['code' => 400, 'info' => '验证短信发送失败']);
        }
    }

    /**
     * 创建图形验证码图片并返回
     *
     * @param  null
     * @return null
     */
    public function getCaptcha(Request $request)
    {
        return Captcha::create('default');
    }

    /**
     * 进行图形验证码的验证
     *
     * @param  null
     * @return null
     */
    public function captchaCheck(Request $request)
    {
        $cpt = $request->get('cpt');
        if(Captcha::check($cpt)){
            return response()->json(['code' => 200, 'info' => '图片验证码通过']);
        }else{
            return response()->json(['code' => 400, 'info' => '图片验证码错误']);
        }
    }

    /**
     * 随机生成指定长度的字符串
     *
     * @param  $len 指定生成字符串的长度
     * @param  $format 指定生成字符串的格式
     * @return String
     */
    private function randString($len = 6, $format = 'ALL')
    {
        $str = "";
        switch ($format) {
            case 'ALL':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
            case 'CHAR':
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-@#~';
                break;
            case 'NUMBER':
                $chars = '0123456789';
                break;
            default :
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-@#~';
                break;
        }
        mt_srand((double)microtime() * 1000000 * getmypid());
        while (strlen($str) < $len) {
            $str .= substr($chars, (mt_rand() % strlen($chars)), 1);
        }
        return $str;
    }
}
