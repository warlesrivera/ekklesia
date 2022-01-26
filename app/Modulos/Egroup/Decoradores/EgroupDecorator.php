<?php

namespace App\Modulos\Egroup\Decoradores;

use App\Models\Egroup;
use Illuminate\Http\Request;
use App\Modulos\Egroup\Repositorio\EgroupRepositorio;
use App\Modulos\Egroup\Interfaces\EgroupInterface;

class EgroupDecorator implements EgroupInterface
{
    protected $datosRepositorio;


    public function __construct(EgroupRepositorio $datosRepositorio)
    {
        $this->datosRepositorio = $datosRepositorio;
    }

    public function list(){
        try {
            $egroups  = $this->datosRepositorio->list();
            return   $egroups;
        } catch (\Exception $e) {
            Log::error($e->getMessage() . ' Line: ' . $e->getLine() . ' File: ' . $e->getFile());
            return  [
                'success' => false,
                'code' => 500,
                "data" => ['message' => $e->getMessage()]
            ];
        }
    }
    public function store(Request $request){}
    public function show(Egroup $egroup){}
    public function update(Request $request, Egroup $egroup){}
    public function destroy(Egroup $egroup){}
    public function egroupUser(Egroup $team,Array $ids){}

}
