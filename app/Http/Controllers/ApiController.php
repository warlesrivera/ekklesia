<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;

/**
 * Clase ApiController encargada de tener los metodos de respuesta y los genericos
 *
 * @author  Sergio Benavides, Ubarles Rivera
 */
class ApiController extends Controller
{
    use ApiResponser;
}
