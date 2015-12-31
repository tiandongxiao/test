<?php

namespace App\Http\Controllers;

use App\Jobs\PostJob;
use App\Jobs\MyJob;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Orangehill\Iseed\Facades\Iseed;
use App\Seeder\InitSeeder;
use Mews\Captcha\Facades\Captcha;
use Overtrue\Socialite\SocialiteManager;
use Overtrue\Wechat\Server;


class TestController extends Controller
{
    private $config = [
        'qq' => [
            'client_id'     => '101278262',
            'client_secret' => '2a9b4fa482ea566e5b8a2c80c3e806a4',
            'redirect'      => 'http://exingdong.com/test/qq/callback',
        ],
        'weibo' => [
            'client_id'     => '4052205488',
            'client_secret' => 'cedfbfd62a3eb07ba9947671f9ffa8f5',
            'redirect'      => 'http://exingdong.com/test/wb/callback',
        ],
        'wechat' => [
            'client_id'     => 'wxece8375442c7704d',
            'client_secret' => '789f069befbc052ee90df22740479bbe',
            'redirect'      => 'www.exingdong.com',
        ],
    ];
    public function queueTest()
    {
        Cache::put('wang','guoying',1);
    }

    public function putCacheValue()
    {
        Cache::put('name','wanga',5);
        $job = (new MyJob())->delay(20);
        $this->dispatch($job);
    }
    public function getCacheValue(){
        echo Cache::get('name');
    }

    public function redisPut(){
        Redis::set('name','I am wangguoying');
    }

    public function redisGet(){
        echo Redis::get('name');
    }

    public function clearJobs(){
        DB::table('jobs')->delete();
    }

    public function backup(){
        $tables = [];

        foreach(DB::select('SHOW TABLES') as $key => $value){
            $table_name =  array_values((array)$value)[0];
            array_push($tables,$table_name);
        }

        if (count($tables)) {
            foreach ($tables as $tableName) {
                Iseed::generateSeed($tableName);
            }
        }
    }

    public function init()
    {
        $seeder = new InitSeeder();
        $seeder->run();
    }

    public function getVcode()
    {
        return Captcha::create('default');
    }

    public function getConfig(){
        $host = Config::get('qiniu.driver');
        echo $host;
    }
    
    public function qqLogin()
    {
        echo 'I am weibo Login';
        $socialite = new SocialiteManager($this->config);

        $response = $socialite->driver('qq')->redirect();

        echo $response;// or $response->send();
    }
    
    public function qqCallback()
    {
        $socialite = new SocialiteManager($this->config);
        $user = $socialite->driver('qq')->user();
        dd($user);
        echo "I am qq callback";
    }
    
    public function wbLogin()
    {
        echo 'I am weibo Login';
        $socialite = new SocialiteManager($this->config);

        $response = $socialite->driver('weibo')->redirect();

        echo $response;// or $response->send();
    }
    
    public function wbCallback()
    {
        $socialite = new SocialiteManager($this->config);
        $user = $socialite->driver('weibo')->user();
        dd($user);
        echo "I am qq callback";
    }
    
    public function wxLogin()
    {
        
        $socialite = new SocialiteManager($this->config);

        $response = $socialite->driver('wechat')->redirect();

        echo $response;// or $response->send();
    }
    
    public function wxCallback()
    {
        echo "I am weixin callback";
        $socialite = new SocialiteManager($this->config);
        $user = $socialite->driver('qq')->user();
        dd($user);
        echo "I am weibo callback";
    }
    
    public function wxCheck(Server $server)
    {
        $server->on('message', function($message){
            return "欢迎关注 overtrue！";
        });

        return $server->serve(); // 或者 return $server; 
    }
}
