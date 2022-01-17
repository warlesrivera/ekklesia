<?php

namespace App\Modulos\Blog\Repositorio;

use App\Models\Egroup;

class EgroupRepositorio
{
    public function list(){}
    public function store( $request){}
    public function show(Egroup $egroup){}
    public function update( $request, Egroup $egroup){}
    public function destroy(Egroup $egroup){}
    public function egroupUser(Egroup $team,Array $ids){}
}
