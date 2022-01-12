<?php

namespace App\Modulos\User\Repositorio;

use App\Models\User;

class UsersRepositorio{

 public function register($data){
    $user = new User();
    $user->name=$data->name;
    $user->email=$data->email;
    $user->headquarter_id=$data->headquarter_id;
    if($user->save())
        return $user;
 }

}
