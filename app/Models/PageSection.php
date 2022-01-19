<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'url',
        'principal',
        'name',
        'landing_page_id',
        'keywords',
        'state',
        'description',
        'description_short'
    ];

    public function landingPage(){
        return $this->belongsTo(LandingPage::class,'id','landing_page_id');
    }

    public function sections(){
        return $this->hasMany(SectionPage::class,'page_id','id');

    }
}
