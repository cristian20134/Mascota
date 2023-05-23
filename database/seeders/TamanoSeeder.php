<?php

namespace Database\Seeders;

use App\Models\Tamano;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TamanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tamano1= new Tamano();
        $tamano1-> tamano_mascota= "Pequeño";
        $tamano1->save();

        $tamano2=new Tamano();
        $tamano2->tamano_mascota = "Mediano";
        $tamano2->save();

        $tamano3=new Tamano();
        $tamano3->tamano_mascota = "Grande";
        $tamano3->save();
    }
}
