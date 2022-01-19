<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LandingPage extends Model
{
    use SoftDeletes;

    protected $fillable = ['url','name','headquarter_id'];

    public function pageSection(){
        return $this->hasMany(PageSection::class,'landing_page_id','id');
    }

    public function menu(){
        return $this->hasOne(MenuPage::class,'landing_page_id','id');
    }

}
