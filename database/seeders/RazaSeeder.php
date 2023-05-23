<?php

namespace Database\Seeders;

use App\Models\Raza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $raza1=new Raza();
        $raza1->raza_mascota = "Yorkshire";
        $raza1->save();

        $raza2=new Raza();
        $raza2->raza_mascota = "Chihuahua";
        $raza2->save();

        $raza3=new Raza();
        $raza3->raza_mascota = "Quiltro";
        $raza3->save();

        $raza4=new Raza();
        $raza4->raza_mascota = "Terrier";
        $raza4->save();

}
}