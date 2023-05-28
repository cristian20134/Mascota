<?php

namespace App\Http\Controllers;

use App\Models\Adopcion;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seguimientos = Seguimiento::all();
        return view('seguimiento.index',compact(['seguimientos']));
    }

    public function create()
    {
        $adopciones = Adopcion::all();
        return view('seguimiento.create',compact(['adopciones']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'select_seguimiento'=>'required|exists:adopcion,id',
            'estado_mascota'=>'required',
            'fecha_seguimiento'=>'required|date_format:Y-m-d',
            'descripcion_seguimiento'=>'required|min:5',
        ]);

        $seguimientos = Seguimiento::create([
            'adopcion_id' =>$request->select_seguimiento,
            'estado_mascota' =>$request->estado_mascota,
            'fecha_seguimiento' =>$request->fecha_seguimiento,
            'descripcion_seguimiento'=>$request->descripcion_seguimiento
        ]);

        if($seguimientos) {
            return redirect()->route('seguimiento.create');
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
