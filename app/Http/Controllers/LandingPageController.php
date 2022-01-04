<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\LandingPage;
use App\Models\Headquarter;
use App\Modulos\LandingPage\Interfaces\LandingPageInterface;


class LandingPageController extends ApiController
{
    protected $landingPageInterface;

    public function __construct(LandingPageInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }





}
