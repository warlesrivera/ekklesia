<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\LandingPage;
use App\Modulos\LandingPage\Interfaces\LandingPageInterface;


class LandingPageController extends ApiController
{
    protected $landingPageInterface;

    public function __construct(LandingPageInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }

    public function index(){

        $data=LandingPage::find(1);


    }



}
