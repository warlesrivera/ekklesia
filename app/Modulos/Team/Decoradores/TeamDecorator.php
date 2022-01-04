<?php

namespace App\Modulos\Team\Decoradores;

use App\Models\Team;
use App\Modulos\Team\Interfaces\TeamInterface;
use App\Modulos\Team\Repositorio\TeamRepositorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TeamDecorator implements TeamInterface
{
    protected $datosRepositorio;


    public function __construct(TeamRepositorio $datosRepositorio)
    {
        $this->datosRepositorio = $datosRepositorio;
    }
    public function list(){
        try {
            $blogs  = $this->datosRepositorio->list();
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
                throw new \Exception('no se pudo guardar el E-TEAM intentalo de nuevo.');

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
    public function show(Team $blog){}
    public function update(Request $request, Team $blog){}
    public function destroy(Team $blog){}
}
