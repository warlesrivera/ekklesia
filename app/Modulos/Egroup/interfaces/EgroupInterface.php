<?php

namespace App\Modulos\Egroup\Interfaces;

use App\Models\Egroup;
use Illuminate\Http\Request;

interface EgroupInterface
{
    public function list();
    public function store(Request $request);
    public function show(Egroup $egroup);
    public function update(Request $request, Egroup $egroup);
    public function destroy(Egroup $egroup);
    public function egroupUser(Egroup $team,Array $ids);

}
