<?php

namespace Database\Seeders;

use App\Models\Autor;
use Illuminate\Database\Seeder;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Autor::create([
            'name' => 'Ludbin Guilberth'
        ]);

        Autor::create([
            'name' => 'Kevin Torrez'
        ]);

        Autor::create([
            'name' => 'Tania Payllo'
        ]);

        Autor::create([
            'name' => 'Susana Ancasi'
        ]);

        Autor::create([
            'name' => 'Eynar Torrez'
        ]);

        Autor::create([
            'name' => 'Jhonny Chura'
        ]);


    }
}
