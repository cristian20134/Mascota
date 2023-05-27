<?php

namespace App\Http\Controllers;

use App\Models\GeneroMascota;
use App\Models\HistorialMedico;
use App\Models\Mascota;
use App\Models\PersonalidadMascota;
use App\Models\Raza;
use App\Models\Tamano;
use Carbon\PHPStan\MacroExtension;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       
        return view('mascota.index');
    }

   
    public function create()
    {
        $razas = Raza::all();
        $generos = GeneroMascota::all();
        $personalidades = PersonalidadMascota::all();
        $tamanos = Tamano::all();
        $historiales = HistorialMedico::all();
        return view('mascota.create', compact('razas','generos','personalidades','tamanos','historiales'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'nombre_mascota'=>'required',
            'select_raza'=>'required|exists:raza,id',
            'genero_mascota'=>'required|exists:genero_mascota,id',
            'tamano'=>'required|exists:tamano,id',
            'personalidad_mascota'=>'required|exists:personalidad_mascota,id',
            'historial_medico'=>'required|exists:historial_medico,id',
            'personalidad_mascota'=>'required|exists:personalidad_mascota,id',
            'fecha_nacimiento_mascota'=>'required|date_format:Y-m-d',
            'comentario_mascota'=>'required|min:5',
        ]);

        $mascotas = Mascota::create([
            'historial_medico_id' =>$request->historial_medico,
            'raza_id' =>$request->select_raza,
            'tamano_id' =>$request->tamano,
            'genero_mascota_id' =>$request->genero_mascota,
            'personalidad_mascota_id' =>$request->personalidad_mascota,
            'nombre_mascota'=>$request->nombre_mascota,
            'fecha_nacimiento_mascota' =>$request->fecha_nacimiento_mascota,
            'comentario_mascota'=>$request->comentario_mascota
        ]);

        if($mascotas) {
            return redirect()->route('mascota.create');
        }
        
    
    }

  
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
