<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('auth.profile_new');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $file = $request->file('avatar')->isValid();
        echo $file;
        $fileName = $request->input('avatar');
        
        // $slogan = \Request::input('slogan');        
        // $userInfo = array(
        //     'file'    => $file,
        //     'slogan' => $slogan
        // );
        
        //Check if Folder exists
        $folderName = date('Ymd');
        if(!\Storage::disk('local')->exists($folderName)){
            \Storage::makeDirectory($folderName);
        }

        //Check Validation
        //$fileName = $file->getClientOriginalName();


        //Save it to Folder
        // \Storage::disk('local')->put($fileName,$file);
        // \Storage::move($fileName,$folderName.'/'.$fileName);
        // if(\Request::hasFile('avatar')){
        //     //Check if Folder exists
        //     $folderName = date('Ymd');
        //     if(!Storage::disk('local')->exists($folderName)){
        //         Storage::makeDirectory($folderName);
        //     }

        //     //Get input File
        //     $file = \Request::file('avatar');

        //     //Check Validation
        //     $fileName = $file->getClientOriginalName();

        //     if(!$file->isValid()){
        //         return [$fileName => 'success'];
        //     }

        //     //Save it to Folder
        //     Storage::disk('local')->put($fileName,$file);
        //     Storage::move($fileName,$folderName.'/'.$fileName);
        // }else{
        //     echo 'weiba';
        // }


        /*
        $user = \Auth::user();
        $validator = Validator::make($userInfo,ValidRule::$phone_login_rules,ValidRule::$phone_login_tips);
        if($validator->passes()){

        }else{
            return \Redirect::to('login')->withErrors($validator);
        } 
        */ 
    }    

}
