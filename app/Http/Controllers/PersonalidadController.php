<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Http\Requests\PersonalidadRequest;
use App\Models\PersonalidadMascota;
use Illuminate\Http\Request;

class PersonalidadController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $personalidades = PersonalidadMascota::all();
        $id= new Mascota();
        return view('personalidad.create',compact(['personalidades','id']));
    }

    public function store(PersonalidadRequest $request)
    {
        $personalidades = PersonalidadMascota::create([
            'personalidad_mascota' => $request->personalidad_mascota
        ]);
        if ($personalidades){
            session()->flash('mensaje', ['success', 'La Personalidad de Mascota se ha registrado correctamente']);
            return redirect()->route('personalidad.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar la Personalidad de Mascota']);
            return redirect()->route('personalidad.create');
           }    
    }

    public function edit(PersonalidadMascota $id)
    {
        $personalidades = PersonalidadMascota::all();
        return view('personalidad.edit',compact(['personalidades','id']));
    }

    public function update(PersonalidadMascota $id, PersonalidadRequest $request)
    {
        
        $update = $id->update([
            'personalidad_mascota'=> $request->personalidad_mascota
        ]);

        if ($update){
            session()->flash('mensaje', ['success', 'Los datos de personalidad se han modificado correctamente']);
            return redirect()->route('personalidad.create');
        }
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al modificar los datos de Personalidad']);
            return redirect()->route('personalidad.create');
    }

    public function destroy($id)
    {
        //
    }
}