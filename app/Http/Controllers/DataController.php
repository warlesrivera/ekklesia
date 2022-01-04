<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index($name=null){

        if(filled($name)){
            $hq=Headquarter::where('name',$name)->first();
            $landing=$hq->landing;
            \Request::session()->flash('title',$name);
            return view('welcome',compact('landing'));
        }else{
            return view('welcome');

        }
    }

}
