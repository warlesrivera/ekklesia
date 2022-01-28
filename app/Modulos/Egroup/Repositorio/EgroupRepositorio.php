<?php

namespace App\Modulos\Egroup\Repositorio;

use App\Models\Egroup;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class EgroupRepositorio
{
    public function list(){
        $egroup = Egroup::all();

        if(Auth::user()->roles()->first()->id!=3)
            $egroup = Egroup::all();

        return datatables()->of($egroup)
            ->addColumn('action', function ($row) {
                $route=Str::of($row->title)->slug('-');
                $row->url=route('blog.show', "{$row->id}-{$route}");
                $row->url_destroy=route('egroup.destroy', [$row->id]);
                $type='Egroup';
                return view()->make('admin.components.button_action',compact('row','type'));
            })
            ->addColumn('users', function ($row) {
                return $row->users->count();
            })
            ->toJson();

    }
    public function store( $request){}
    public function show(Egroup $egroup){}
    public function update( $request, Egroup $egroup){}
    public function destroy(Egroup $egroup){}
    public function egroupUser(Egroup $team,Array $ids){}
}
