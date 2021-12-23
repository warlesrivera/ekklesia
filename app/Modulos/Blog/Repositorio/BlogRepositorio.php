<?php

namespace App\Modulos\Blog\Repositorio;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Models\Attachment;
class BlogRepositorio
{
    public function index()
    {
        $blog = Blog::where('state', Config::get('constants.ACTIVO'))->get();

        return datatables()->of($blog)
            ->addColumn('action', function ($row) {
                return view()->make('admin.components.button_action',compact('row'));

            })
            ->addColumn('date', function ($row) {
                return $row->created_at->format('d-m-Y');
            })
            ->addColumn('user', function ($row) {
                return $row->user->full_name;
            })
            ->addColumn('state', function ($row) {
                return $row->name_state;
            })
            ->toJson();
    }
    public function store($request)
    {

        $images = null;
        $blog               = new Blog();
        $blog->title        = $request->title;
        $blog->description  = $request->description;
        $blog->images       = $images;
        $blog->state        = Config::get('constants.ACTIVO');
        $blog->user_id      = Auth::id();
        $blog->count        = 0;

        if ($request->file('images'))
         $blog->images = $this->images($request);

        if ($blog->save())
            return $blog;
    }
    public function show($id)
    {
    }
    public function update($request, Blog $blog)
    {
        $blog->fill($request->all());
        $blog->images =$this->images($request);

        return $blog->save();
    }
    public function destroy(Blog $blog)
    {
    }

    protected function images($request){
        if ($request->file('images')) {
            //save image
            $imagenArray = array();
            foreach ($request->file('images') as $key => $img_tmp) {
                array_push($imagenArray, Attachment::image($img_tmp, 'img'));
            }
            return json_encode($imagenArray);
        }
        return null;
    }
}
