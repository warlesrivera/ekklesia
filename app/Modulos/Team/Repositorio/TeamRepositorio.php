<?php

namespace App\Modulos\Team\Repositorio;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class TeamRepositorio
{
    public function list()
    {
        $blog = Team::get();

        return datatables()->of($blog)
            ->addColumn('action', function ($row) {
                return view()->make('admin.components.button_action',compact('row'));
            })
            ->addColumn('date', function ($row) {
                return $row->created_at->format('d-m-Y');
            })
            ->addColumn('hadquarter', function ($row) {
                return $row->headquarter->name;
            })
            ->addColumn('count_user', function ($row) {
                return $row->user->count();
            })
            ->toJson();
    }

    public function store($request)
    {
        $team   = new Team();
        $team->fill($request->all());
        if(blank($request->headquarter_id))
            $team->headquarter_id = Auth::user()->headquarter_id;

        if ($request->file('images'))
         $team->images =json_encode( saveImages($request,'team'));

        if ($team->save())
            return $team;
    }
}
