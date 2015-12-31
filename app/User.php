<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Zizaco\Entrust\Traits\EntrustUserTrait;

use App\Traits\Relations\HasManyPostsTrait;
use App\Traits\Relations\HasManyCommentsTrait;
use App\Traits\Ralations\HasManyPagesTrait;
use App\Traits\Relations\HasManyEventsTrait;

class User extends Model implements AuthenticatableContract,AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait; // add this trait to your user model
    use HasManyPostsTrait, HasManyEventsTrait,HasManyCommentsTrait;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone','email', 'password','active','avatar'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function beforeDelete()
    {
        $this->deletePages();
        $this->deletePosts();
        $this->deleteComments();
        $this->deleteEvents();
    }
}
