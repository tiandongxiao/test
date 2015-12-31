<?php

namespace App\SDK;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RongLianAPI
{
    //主帐号
    private $accountSid= '8a48b5514ff923b40150119d8b3230db';

    //主帐号Token
    private $accountToken= '3ce5711b41f540af9ca0ad879e9989ec';

    //应用Id
    //private $appId='8a48b5514ff923b40150119dbd8c30e4';
    private $appId='8a48b55150121695015012b7e55f021d';

    //请求地址，格式如下，不需要写https://
    private $serverIP='app.cloopen.com';//'sandboxapp.cloopen.com';

    //请求端口 
    private $serverPort='8883';

    //REST版本号
    private $softVersion='2013-12-26';

    private $rest = null;


    public function __construct()
    {
         // 初始化容联 REST SDK         
         $this->rest = new RongLian($this->serverIP,$this->serverPort,$this->softVersion);
         $this->rest->setAccount($this->accountSid,$this->accountToken);
         $this->rest->setAppId($this->appId);
    }
    /**
      * 发送模板短信
      * @param to 手机号码集合,用英文逗号分开
      * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
      * @param $tempId 模板Id
      */       
    function sendSMS($to,$datas,$tempId)
    {        
         // 发送模板短信         
         $result = $this->rest->sendTemplateSMS($to,$datas,$tempId);
         if($result == NULL || $result->statusCode!=0) {
            return false;   
         }else{
            return true;
         }
    }  
}
