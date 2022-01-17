<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class CkeditorController extends Controller
{

 public function index(){}
 public function upload(Request $request){

    $image =Attachment::image($request->upload,'ckeditorImage');
    return response()->json(['url'=>asset('storage/img/ckeditor/').'/'.$image]);

 }
}
