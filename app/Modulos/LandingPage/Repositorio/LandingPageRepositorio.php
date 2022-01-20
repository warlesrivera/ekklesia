<?php

namespace App\Modulos\LandingPage\Repositorio;

use App\Models\LandingPage;
use Illuminate\Support\Facades\Auth;

class LandingPageRepositorio
{
    public function list()
    {

        $landingPage = LandingPage::all();

        if(Auth::user()->roles()->first()->id!=3)
            $landingPage = LandingPage::where('state', Config::get('constants.ACTIVO'))->get();

        return datatables()->of($landingPage)
        ->addColumn('action', function ($row) {

            $route=Str::of($row->name)->slug('-');
            $row->url=route('landing.show', "{$row->id}-{$route}");
            $row->url_destroy=route('landing.destroy', [$row->id]);
            $type='Landing';
            return view()->make('admin.components.button_action',compact('row','type'));

        })
        ->addColumn('headquarter', function ($row) {
            return $row->headquarter->name;
        })
        ->addColumn('state', function ($row) {
            return $row->name_state;
        })
        ->toJson();
    }
}

