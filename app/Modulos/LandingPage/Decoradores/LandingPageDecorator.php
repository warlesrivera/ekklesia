<?php

namespace App\Modulos\LandingPage\Decoradores;

use App\LandingPage;
use App\Modulos\LandingPage\Interfaces\LandingPageInterface;
use Illuminate\Http\Request;

class LandingPageDecorator implements LandingPageInterface
{
    public function list(){}
    public function store(Request $request){}
    public function show(LandingPage $landingPage){}
    public function update(Request $request, LandingPage $landingPage){}
    public function destroy(LandingPage $landingPage){}
}
