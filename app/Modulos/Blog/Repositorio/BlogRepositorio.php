<?php

namespace App\Modulos\Blog\Repositorio;

use stdClass;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Modulos\User\Repositorio\UsersRepositorio;
class BlogRepositorio
{
    public function list()
    {

        $blog = Blog::all();

        if(Auth::user()->roles()->first()->id!=3)
            $blog = Blog::where('state', Config::get('constants.ACTIVO'))->orWhere('user_id',Auth::id())->get();


        return datatables()->of($blog)
            ->addColumn('action', function ($row) {

                $route=Str::of($row->title)->slug('-');
                $row->url=route('blog.show', "{$row->id}-{$route}");
                $row->url_destroy=route('blog.destroy', [$row->id]);
                $type='Blog';
                return view()->make('admin.components.button_action',compact('row','type'));

            })
            ->addColumn('roles', function ($row) {

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
        $blog                   = new Blog();
        $blog->title            = $request->title;
        $blog->description      = $request->description;
        $blog->images           = $images;
        $blog->state            = filled($request->state)?$request->state:Config::get('constants.INACTIVO');
        $blog->user_id          = Auth::id();
        $blog->headquarter_id   = Auth::user()->headquarter_id;
        $blog->count            = 0;

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
        if (array_key_exists("MoreimgGaleryPre",$request->all())  && !blank($blog->images)){

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

        if(!blank($request->images))
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

    public function likes($blog){

        $like=$blog->likes()->where('user_id',Auth::id())->first();
        if(filled($like)){
            return $like->delete()?'ya no te gusta este blog':'no se pudo alamcenar intentalo mas tarde.';
        }else{
            return $blog->likes()->create(['user_id'=>Auth::id(),'like'=>true])?'te gusta este blog':'';
        }
    }
}
