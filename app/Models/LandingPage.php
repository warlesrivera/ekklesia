<?php

namespace App\Models;

use App\Models\Headquarter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LandingPage extends Model
{
    use SoftDeletes;

    protected $fillable = ['url','name','headquarter_id','visits'];

    public function getNameStateAttribute(){
        return $this->state==1?'Activo':"Inactivo";
    }
    public function pageSection(){
        return $this->hasMany(PageSection::class,'landing_page_id','id');
    }

    public function menu(){
        return $this->hasOne(MenuPage::class,'landing_page_id','id');
    }

    public function headquarter(){
        return $this->hasOne(Headquarter::class,'headquarter_id','id');

    }

}
