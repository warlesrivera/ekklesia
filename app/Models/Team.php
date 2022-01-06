<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name','description','description_short','images'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'teams_users','team_id','user_id');
    }

    public function Headquarter()
    {
        return $this->belongsTo(Headquarter::class);
    }
}
