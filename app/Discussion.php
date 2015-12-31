<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Relations\BelongsToUserTrait;

class Discussion extends Model
{
    use BelongsToUserTrait;
    protected $fillable = ['title', 'body','user_id','last_user_id'];
}
