<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Headquarter extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','address','lat','long','schedule'];

    public function blogs(){
        return $this->HasMany(Blog::class, 'id_hadquarter', 'id');
    }

    public function users(){
        return $this->HasMany(User::class, 'id_hadquarter', 'id');
    }

    public function landing(){
        return $this->HasOne(LandingPage::class,'id_headquarter','id');
    }

}
