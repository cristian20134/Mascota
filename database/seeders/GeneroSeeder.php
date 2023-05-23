<?php

namespace Database\Seeders;

use App\Models\GeneroMascota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero1=new GeneroMascota();
        $genero1->genero_mascota = "Masculino";
        $genero1->save();

        $genero2=new GeneroMascota();
        $genero2->genero_mascota = "Femenino";
        $genero2->save();
    }
}
