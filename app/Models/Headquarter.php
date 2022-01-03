<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','address','lat','long','schedule'];
}
