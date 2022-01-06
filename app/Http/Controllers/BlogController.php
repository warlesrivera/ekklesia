<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Modulos\Blog\Interfaces\BlogInterface;
use Illuminate\Support\Facades\Auth;

class BlogController extends ApiController
{

    protected $blogInterface;

    public function __construct(BlogInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $datos =$this->blogInterface->list();
        return  $datos;
    }

    public function index(){
        return view('admin.Blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos =$this->blogInterface->store($request);
        return  $datos['success']
        ? $this->successResponse([ 'data' =>$datos['data']], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {

            if(filled($blog->images)){
                $images =json_decode($blog->images);
                $route = asset('storage/img/team').'/'. Auth::id();
                $blog->elementImage .=view()
                                    ->make('admin.components.images_element')
                                    ->with('images',$images)
                                    ->with('route',$route);

            }


       return $this->showOne($blog,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $datos =$this->blogInterface->update($request,$blog);
        return  $datos['success']
        ? $this->successResponse($datos['data'], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $datos =$this->blogInterface->destroy($blog);
        return  $datos['success']
        ? $this->successResponse($datos['data'], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }
}
