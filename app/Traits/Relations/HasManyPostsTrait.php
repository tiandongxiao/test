<?php namespace App\Traits\Relations;
/**
 * Created by PhpStorm.
 * User: lefamily
 * Date: 2015/11/4
 * Time: 16:53
 */
trait HasManyPostsTrait
{
    /**
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     *
     */
    public function deletePosts()
    {
        foreach($this->posts as $post){
            $post->delete();
        }
    }
}