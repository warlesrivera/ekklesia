<?php

namespace App\Modulos\LandingPage\Decoradores;

use App\LandingPage;
use App\Modulos\LandingPage\Interfaces\LandingPageInterface;
use App\Modulos\LandingPage\Repositorio\LandingPageRepositorio;
use Illuminate\Http\Request;

class LandingPageDecorator implements LandingPageInterface
{

    protected $datosRepositorio;

    public function __construct(LandingPageRepositorio $datosRepositorio)
    {
        $this->datosRepositorio = $datosRepositorio;
    }
    public function list(){
        try {

            $landing  = $this->datosRepositorio->list();
            return   $landing;
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
    public function show(LandingPage $landingPage){}
    public function update(Request $request, LandingPage $landingPage){}
    public function destroy(LandingPage $landingPage){}
}
