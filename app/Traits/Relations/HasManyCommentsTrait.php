<?php namespace App\Traits\Relations;
/**
 * Created by PhpStorm.
 * User: lefamily
 * Date: 2015/11/4
 * Time: 16:40
 */
trait HasManyCommentsTrait
{
    /**
     * @return mixed
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Delete all the comments
     */
    public function deleteComments()
    {
        foreach($this->comments as $comment){
            $comment->delete();
        }
    }
}