<?php

namespace App\Http\Controllers;


class EgroupController extends ApiController
{
    protected $eGroupInterface;

    public function __construct(EgroupInterface $eGroupInterface)
    {
        $this->eGroupInterface = $eGroupInterface;
    }
}
