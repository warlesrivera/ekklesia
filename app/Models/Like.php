<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['likeable_id','likeable_type','like','user_id'];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function userAll()
    {
        return $this->hasOne('App\User','id','user_id');
    }

}
