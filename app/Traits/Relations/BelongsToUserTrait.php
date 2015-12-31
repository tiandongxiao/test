<?php namespace App\Traits\Relations;
/**
 * Created by PhpStorm.
 * User: lefamily
 * Date: 2015/11/4
 * Time: 16:36
 */
trait BelongsToUserTrait
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}