<?php namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class QQMailerFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'QQMailer';
	}
}

?>