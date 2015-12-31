<?php namespace App\Traits\Relations;
/**
 * Created by PhpStorm.
 * User: lefamily
 * Date: 2015/11/4
 * Time: 16:44
 */

trait HasManyEventsTrait
{
    /**
     *  Get Event relation
     *  @return \Illuminate\Database\Eloquent\Relations\HasOneOrMany
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }

    /**
     * Delete all events
     */
    public function deleteEvents()
    {
        foreach($this->events as $event){
            $event->delete();
        }
    }
}