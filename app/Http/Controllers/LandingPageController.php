<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\LandingPage;
use App\Models\Headquarter;
use App\Modulos\LandingPage\Interfaces\LandingPageInterface;


class LandingPageController extends ApiController
{
    protected $landingPageInterface;

    public function __construct(LandingPageInterface $landingPageInterface)
    {
        $this->landingPageInterface = $landingPageInterface;
    }

    public function list()
    {
        $datos =$this->landingPageInterface->list();
        return  $datos;
    }

    public function index(){
        return view('admin.LandingPage.index');
    }

    public function create(){

        return view('admin.LandingPage.create');
    }

    public function show(){}

    public function changeMenu($type){

        $html =''. view()->make('admin.LandingPage.components.show.menu_page',compact('type'));
        $data=['html'=>$html];
        return $this->successResponse($data,200);

    }

}
