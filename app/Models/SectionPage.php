<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionPage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'style',
        'position',
        'state',
        'title',
        'subtitle',
        'text_short',
        'description',
        'position_title',
        'position_subtitle',
        'position_short',
        'position_description',
        'images',
        'images_principal',
        'position_images',
        'position_images_principal',
        'page_id',
    ];

    public function page()
    {
        return $this->BelongsTo(PageSection::class,'id','Page_id');
    }

}
