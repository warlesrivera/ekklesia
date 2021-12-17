<?php

namespace App\Modulos\Blog\Repositorio;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class BlogRepositorio
{
    public function index(){
        return Blog::where('state',Config::get('constants.ACTIVO'))
                ->paginate(10);

    }
    public function store($request){
        $images=null;
        if($request->file('images'))
        $images = \App\Attachment::image(Auth::id(), $request->file('images'), 'blog');

        $blog               = new Blog();
        $blog->title        = $request->title;
        $blog->description  = $request->description;
        $blog->images       = $images;
        $blog->date         = $request->date;
        $blog->state        = Config::get('constants.ACTIVO');
        $blog->user_id      = Auth::id();
        $blog->count        = 0;

        if($blog->save())
        return $blog;

    }
    public function show( $id){

    }
    public function update( $request, Blog $blog){

    }
    public function destroy(Blog $blog){

    }
}
