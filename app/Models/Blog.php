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
        return $this->BelongsTo('App\Models\User', 'id', 'user_id');
    }

    public function getNameStateAttribute(){
        return $this->state==1?'Activo':"Inactivo";
    }

}
