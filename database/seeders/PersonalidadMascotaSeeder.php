<?php

namespace Database\Seeders;

use App\Models\PersonalidadMascota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalidadMascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personalidad1= new PersonalidadMascota();
        $personalidad1->personalidad_mascota = "Amistoso";
        $personalidad1->save();

        $personalidad2=new PersonalidadMascota();
        $personalidad2->personalidad_mascota = "Sociable";
        $personalidad2->save();
    }
}
