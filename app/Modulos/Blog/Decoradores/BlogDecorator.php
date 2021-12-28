<?php

namespace App\Modulos\Blog\Decoradores;

use App\Models\Blog;
use App\Modulos\Blog\Interfaces\BlogInterface;
use App\Modulos\Blog\Repositorio\BlogRepositorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogDecorator implements BlogInterface
{
    protected $datosRepositorio;


    public function __construct(BlogRepositorio $datosRepositorio)
    {
        $this->datosRepositorio = $datosRepositorio;
    }
    public function list(){
        try {

            $blogs  = $this->datosRepositorio->index();
            return   $blogs;


        } catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
            return  [
                'success' => false,
                'code' => 500,
                "data"=>['message' => $e->getMessage()]
            ];
        }
    }
    public function store(Request $request){
        try {
            $blog=$this->datosRepositorio->store($request);
            if(blank($blog))
                throw new \Exception('no se pudo guardar el blog intentalo de nuevo.');

            return  [
                    'success' => true,
                    'code' => 200,
                    "data"=>['message' => 'BLog crado a la espera de ser aprobado por la admin.',
                             'blog' =>$blog
                    ]
            ];

        } catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
            return  [
                'success' => false,
                'code' => 500,
                "data"=>['message' => $e->getMessage()]
            ];
        }
    }
    public function show(Blog $blog){

    }

    public function update(Request $request, Blog $blog){
        try {
            $blog=$this->datosRepositorio->update($request,$blog);
            if(!$blog)
                throw new \Exception('no se pudo actualizar el blog intentalo de nuevo.');

            return  [
                'success' => true,
                'code' => 200,
                "data"=>['message' => 'Datos Actualizados']
            ];

        } catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
            return  [
                'success' => false,
                'code' => 500,
                "data"=>['message' => $e->getMessage()]
            ];
        }
    }
    public function destroy(Blog $blog){

    }
}
