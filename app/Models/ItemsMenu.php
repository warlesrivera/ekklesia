<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsMenu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','position','state','url','menu_page_id','item_menu_id'];

}
