<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model{

    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title','description','images','date','state','user_id','count','id_hadquarter'
    ];

    public function user(){
        return $this->BelongsTo(User::class, 'user_id', 'id');
    }

    public function getNameStateAttribute(){
        return $this->state==1?'Activo':"Inactivo";
    }

    public function comment(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function likes(){
        return $this->morphMany(Like::class,'likeable');
    }

}
