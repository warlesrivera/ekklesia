<?php

namespace App\Modulos\Egroup\Decoradores;

use App\Models\Egroup;
use Illuminate\Http\Request;
use App\Modulos\Blog\Repositorio\EgroupRepositorio;
use App\Modulos\Egroup\Interfaces\EgroupInterface;

class EgroupDecorator implements EgroupInterface
{
    protected $datosRepositorio;


    public function __construct(EgroupRepositorio $datosRepositorio)
    {
        $this->datosRepositorio = $datosRepositorio;
    }

    public function list(){}
    public function store(Request $request){}
    public function show(Egroup $egroup){}
    public function update(Request $request, Egroup $egroup){}
    public function destroy(Egroup $egroup){}
    public function egroupUser(Egroup $team,Array $ids){}

}
