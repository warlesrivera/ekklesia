<?php

namespace App\Http\Controllers;

use App\Models\Headquarter;
use App\Models\User;

class UserController extends Controller{

    public function userList(){
        return User::where('headquarter_id',Headquarter::first()->id)->get();
    }
}
