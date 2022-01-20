<?php

namespace App\Modulos\LandingPage\Interfaces;

use App\LandingPage;
use Illuminate\Http\Request;

interface LandingPageInterface
{
    public function list();
    public function store(Request $request);
    public function show(LandingPage $landingPage);
    public function update(Request $request, LandingPage $landingPage);
    public function destroy(LandingPage $landingPage);

}
