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

    public function create(PersonalidadMascota $id)
    {
        $personalidades = PersonalidadMascota::withTrashed()->get();
        return view('personalidad.create',compact(['personalidades','id']));
    }

    public function store(PersonalidadRequest $request)
    {
        $personalidades = PersonalidadMascota::create([
            'personalidad_mascota' => $request->personalidad_mascota
        ]);
        if ($personalidades){
            session()->flash('mensaje', ['success', 'La personalidad de mascota se ha registrado correctamente.']);
            return redirect()->route('personalidad.create');
        
            session()->flash('mensaje', ['danger', 'Se ha producido un error al registrar la personalidad de mascota.']);
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
            session()->flash('mensaje', ['success', 'Los datos de personalidad se han modificado correctamente.']);
            return redirect()->route('personalidad.create');
        }
            session()->flash('mensaje', ['danger', 'Se ha producido un error al modificar los datos de personalidad.']);
            return redirect()->route('personalidad.create');
    }

    public function delete(PersonalidadMascota $info)
    {
        try {
            if ($info->delete()){
                session()->flash('mensaje', ['success', 'Se elimino la personalidad ']);
                return redirect()->route('personalidad.create');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar la personalidad.']);
            return redirect()->route('personalidad.create');

        } catch( \Exception $e) {
            abort(403);
        }
    }

    public function restore($info) {
        try {
            if (PersonalidadMascota::withTrashed()->findOrFail($info)->restore() ){
                session()->flash('mensaje', ['success', 'Se recuperó la personalidad.']);
                return redirect()->route('personalidad.create');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar la personalidad.']);
            return redirect()->route('home');

        } catch( \Exception $e) {
            abort(403);
        }
    }
    
}