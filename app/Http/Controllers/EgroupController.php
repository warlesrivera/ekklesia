<?php

namespace App\Http\Controllers;

use App\Modulos\Egroup\Interfaces\EgroupInterface;

class EgroupController extends ApiController
{
    protected $eGroupInterface;

    public function __construct(EgroupInterface $eGroupInterface)
    {
        $this->eGroupInterface = $eGroupInterface;
    }

    public function list()
    {
        $datos =$this->eGroupInterface->list();
        return  $datos;
    }

    public function index(){
        return view('admin.Egroup.index');
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $datos =$this->blogInterface->store($request);
        return  $datos['success']
        ? $this->successResponse($datos['data'], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }

    public function show(Blog $blog,$slug = null)
    {
        $blog =$this->blogInterface->addCount($blog);
        return view('blog.show',compact('blog'));
    }

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


    public function update(Request $request, Blog $blog)
    {
        $datos =$this->blogInterface->update($request,$blog);
        return  $datos['success']
        ? $this->successResponse($datos['data'], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }

    public function destroy(Blog $blog)
    {
        $datos =$this->blogInterface->destroy($blog);
        return  $datos['success']
        ? $this->successResponse($datos['data'], $datos['code'])
        : $this->errorResponse($datos['data']['message'], $datos['code']);
    }


}
