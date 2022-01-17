<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egroup extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'address','lat','long','schedule','user_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'egroups_users','egroup_id','user_id');
    }
}
