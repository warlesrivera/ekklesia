<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = DB::table('catogories');
        $data->insert([
            'description' => 'Fe',
            'state' => true,
            'type' => 'fe',
        ]);
        $data->insert([
            'description' => 'Oracion',
            'state' => true,
            'type' => 'ora',
        ]);
        $data->insert([
            'description' => 'Gracia',
            'state' => true,
            'type' => 'Gra',
        ]);
        $data->insert([
            'description' => 'Soledad',
            'state' => true,
            'type' => 'Sol',
        ]);
        $data->insert([
            'description' => 'Ayuda',
            'state' => true,
            'type' => 'Ayu',
        ]);
        $data->insert([
            'description' => 'Tormenta',
            'state' => true,
            'type' => 'tor',
        ]);
        $data->insert([
            'description' => 'Fortaleza',
            'state' => true,
            'type' => 'for',
        ]);
        $data->insert([
            'description' => 'Amor',
            'state' => true,
            'type' => 'Amo',
        ]);
        $data->insert([
            'description' => 'Mayordomia',
            'state' => true,
            'type' => 'May',
        ]);
    }
}
