<?php namespace App\SDK;
/*
 *  Copyright (c) 2015 易行动. All Rights Reserved.
 *
 *  QQMailer是对QQ企业邮箱服务的封装。
 *
 *  http://www.exingdong.com
 *
 *  Author : Guoying Wang at 2015-09-28
 *
 */

class QQMailer 
{
	private $host = 'smtp.exmail.qq.com';
	private $port = 465;
	private $encryption = 'ssl';
	private $username ='team@exingdong.com';
	private $password ='Sanmingzhi85';
	private $nickname = 'E行动';

	private $transport;
	private $mailer;
	private $message;


	public function __construct()
	{
		// 设置邮件系统服务器、端口、加密方式以及用户账号信息
		$this->transport = 
			\Swift_SmtpTransport::newInstance($this->host, $this->port, $this->encryption)
	            ->setUsername($this->username)
	            ->setPassword($this->password);
	    // 传入上面配置好的参数用以得到一个Swift_Mailer实例化对象        
	    $this->mailer =  \Swift_Mailer::newInstance($this->transport);

	}

	public function setContent($message = null)
	{
		$message = array(
			'subject'   =>   '重置密码邮件',
			'to'        =>   'sanmingzhi@163.com',
			'nickname'  =>   'sanmingzhi',			
			'view'      =>   'email.password',
			'token'     =>   csrf_token()
		
		);
		// 配置邮件的相关内容信息
		$this->message = \Swift_Message::newInstance($message['subject'])
					->setFrom(array( $this->username => $this->nickname ))
					->setTo(array( $message['to'] => $message['nickname']))
					->setBody(View($message['view'])->withToken($message['token']), 'text/html');

	}

	public function send($message = null)
	{
		$this->setContent($message);
	    try{
            $this->mailer->send($this->message);
            return true;           
        }catch (Exception $e){
            return false;               
        }
	}
}

?>
