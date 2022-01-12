<?php

namespace App\Modulos\Blog\Repositorio;

use App\Models\Blog;
use App\Modulos\User\Repositorio\UsersRepositorio;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use stdClass;
class BlogRepositorio
{
    public function list()
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
        $blog->state        = filled($request->state)?$request->state:Config::get('constants.ESTADO_INACTIVO');
        $blog->user_id      = Auth::id();
        $blog->count        = 0;

        if ($request->file('images'))
         $blog->images =json_encode( saveImages($request,'blog'));

        if ($blog->save())
            return $blog;
    }
    public function show($id)
    {
    }
    public function update($request, Blog $blog)
    {
        $dataImages=[];
        $newDataImages=[];
        $blog->images= json_decode($blog->images);
        if (array_key_exists("MoreimgGaleryPre",$request->all())  && !empty($blog->images)){

            $dataImages= deleteImages(json_decode($request->MoreimgGaleryPre),'blog',$blog->images);
            if(blank($blog->images))
                $blog->images= array_merge($blog->images,$dataImages);
            else
            $blog->images=$dataImages;
        }

        if(array_key_exists("images",$request->all())){

            $newDataImages=saveImages('blog',$request);
            if(filled($blog->images))
                $blog->images= array_merge($blog->images,$newDataImages);
            else
                $blog->images=$newDataImages;

        }
        $blog->fill($request->except('images'));
        $blog->images=json_encode($blog->images);

        return $blog->save();
    }
    public function destroy(Blog $blog)
    {

        if(!empty($blog->images))
            deleteImage('blog',json_decode($blog->images));

        return  $blog->delete();
    }

    public function comment( $request, $blog){
        $user_id=null;
        if(Auth::id()){
            $user_id=Auth::id();
        }else{
            $user_id=User::where('email',$request->email)->first()->id;
            if(blank($user_id)){
                $user= new UsersRepositorio();
                $data = new stdClass;
                $data->name=$request->name;
                $data->email=$request->email;
                $data->headquarter_id=$blog->headquarter_id;
                $user=$user->register($data);
                $user_id=$user->id;
            }
        }
        return $blog->comment()->create([
            "message"=> $request->comment,
            "user_id"=>$user_id,
            "date" =>Carbon::now()
        ]);
    }
}
