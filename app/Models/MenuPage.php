<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['style','position','state','landing_page_id'];

    public function landingPage(){
        return $this->belongsTo(LandingPage::class,'id','landing_page_id');
    }
}
