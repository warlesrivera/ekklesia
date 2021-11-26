<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LandingPage extends Model
{
    use SoftDeletes;

    protected $fillable = ['home','nostros'];

}
