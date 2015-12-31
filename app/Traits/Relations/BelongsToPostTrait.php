<?php namespace App\Traits\Relations;
/**
 * Created by PhpStorm.
 * User: lefamily
 * Date: 2015/11/4
 * Time: 17:05
 */
trait BelongsToPostTrait
{
    /**
     * @return mixed
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}