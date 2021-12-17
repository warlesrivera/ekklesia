<?php

namespace App\Modulos\Blog\Decorador;

use App\Models\Blog;
use App\Modulos\Blog\Interfaces\BlogInterface;
use App\Modulos\Blog\Repositorio\BlogRepositorio;
use Illuminate\Http\Request;

class BlogDecorator implements BlogInterface
{
    protected $datosRepositorio;


    public function __construct(BlogRepositorio $datosRepositorio)
    {
        $this->datosRepositorio = $datosRepositorio;
    }
    public function index(){
        try {
            $blogs  = $this->datosRepositorio->index();

            return  [
                'success' => true,
                'code' => 200,
                'datos' => ['blogs' => $blogs]
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

    }
    public function destroy(Blog $blog){

    }
}
