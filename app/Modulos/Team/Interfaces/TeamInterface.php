<?php

namespace App\Modulos\Team\Interfaces;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

interface TeamInterface
{
    public function list();
    public function store(Request $request);
    public function show(Team $blog);
    public function update(Request $request, Team $blog);
    public function destroy(Team $blog);
    public function teamUser(Team $blog,array $ids);

}
