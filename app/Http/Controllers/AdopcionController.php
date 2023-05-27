<?php

namespace App\Http\Controllers;

use App\Models\Adopcion;
use App\Models\Mascota;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdopcionController extends Controller
{
  
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('adopcion.index');
    }


    public function create()
    {
        $usuarios = Usuario::all();
        $mascotas = Mascota::all();
        return view('adopcion.create',compact(['usuarios','mascotas']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'select_usuario'=>'required|exists:usuario,id',
            'select_mascota'=>'required|exists:mascota,id',
            'nombre_cuidad'=>'required',
            'fecha_adopcion'=>'required|date_format:Y-m-d',
            'descripcion_adopcion'=>'required|min:5',
        ]);

        $adopciones = Adopcion::create([
            'usuario_id' =>$request->select_usuario,
            'mascota_id' =>$request->select_mascota,
            'nombre_cuidad' =>$request->nombre_cuidad,
            'fecha_adopcion' =>$request->fecha_adopcion,
            'descripcion_adopcion'=>$request->descripcion_adopcion
        ]);

        if($adopciones) {
            return redirect()->route('adopcion.create');
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
