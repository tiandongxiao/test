<?php namespace App;

use Illuminate\Support\Facades\Validator;

class ValidRule
{
    public static function validator(array $data, $rule)
    {
        $valid_info =  ValidRule::getRulesTips($rule);
        return  Validator::make($data, $valid_info['rules']);
        //return  Validator::make($data, $valid_info['rules'],$valid_info['tips']);
    }

    public static function getRulesTips($rule)
    {        
        switch ($rule) {
            case 'phone_reg':
                return self::phone_regist();
            case 'phone_login' :
                return self::phone_login();
            case 'phone_pwd_1':
                return self::phone_pwd_reset_1();
            case 'phone_pwd_2':
                return self::phone_pwd_reset_2(); 
            case 'email_reg':
                return self::email_regist();
            case 'email_login':
                return self::email_login();
            case 'post_email':
                return self::email_pass_post();
            case 'post_email_reset':
                return self::email_reset_post();
            default:                
                break;
        }
    }

    public static function phone_regist()
    {
        return array(
            'rules' => array(
                'phone'       => 'required|min:11|max:15|unique:users',
                'password'    => 'required|min:6|max:16|confirmed',
                'vcode'       => 'required',
            ),
        );
    } 

    public static function phone_login()
    {
        return array(
            'rules' => array(
                'phone'       => 'required|min:11|max:15',
                'password'    => 'required|min:6|max:16|',              
            ),
        );
    }   


    public static function phone_pwd_reset_1()
    {
        return array(
            'rules' => array(
                'phone'       => 'required|min:11|max:15',
                'vcode'       => 'required'             
            ),
        );
    }

    public static function phone_pwd_reset_2()
    {
        return array(
            'rules' => array(
                'password'    => 'required|min:6|max:16|confirmed',              
            ),
        );
    }

    public static function email_regist()
    {
        return array(
            'rules' => array(
                'email'       => 'required|email|unique:users',
                'password'    => 'required|between:6,20|confirmed',
                'cpt'         => 'required|captcha'
            ),
        );
    }

    public static function email_login()
    {
        return array(
            'rules' => array(
                'email'       => 'required|email',
                'password'    => 'required|min:6|max:16'
            ),
        );
    }

    public static function email_pass_post()
    {
        return array(
            'rules' => array(
                'email'  => 'required|email',
            ),
        );
    }

    public static function email_reset_post()
    {
        return array(
            'rules' => array(
                'email'       => 'required|email',
                'password'    => 'required|min:6|max:16|confirmed',
                'token'       => 'required',
            ),
        );
    }
}