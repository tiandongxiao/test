<?php namespace App\Traits\Ralations;
/**
 * Created by PhpStorm.
 * User: lefamily
 * Date: 2015/11/4
 * Time: 16:49
 */

trait HasManyPagesTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function pages(){
        return $this->hasMany('App\Page');
    }

    /**
     * Delete all the pages
     */
    public function deletePages(){
        foreach($this->pages as $page){
            $page->delete();
        }
    }
}