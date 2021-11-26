<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['commentable_id','commentable_type','message','user_id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function userAll()
    {
        return $this->hasOne('App\User','id','user_id');
    }


}
