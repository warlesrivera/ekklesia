<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;
use App\User;

class InitWeb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:initWeb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crer roles y manager del sistema';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        $arrayRoles=array(
            ["name" => "Manager","guard_name" => "web"],//array de los modelos de riesgo del sistema
            ["name" => "Admin","guard_name" => "web"],
            ["name" => "user","guard_name" => "web"],

        );
          foreach ($arrayRoles as  $rolarray) {//los insertamos a la base de datos
            $rolarray=new Role($rolarray);
            $rolarray->save();
          }

        $user =new User();
        $user['name']="Ekklesia";
        $user['last_name']="Maniales";
        $user['email']="ekklesiamanizales@ekklesia.com";
        $user['password']=bcrypt("3kkl3s14_2021*");
        $user['gender']="0";
        $user['phone']="3173536501";
        $user['remember_token']="SaW1oLgVW7iDUVfRvBbwQijGCPP4X9qvP1TSIKJpPcq8RJoJF97xZq68HDd3";
        $user->save();
        $user->assignRole(1);
        echo'comando finalizado';
    }
}
