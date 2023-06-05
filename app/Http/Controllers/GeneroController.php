<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneroRequest;
use App\Models\GeneroMascota;
use App\Models\Mascota;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $generos = GeneroMascota::withTrashed()->get();
        $id= new Mascota();
        return view('genero.create',compact('generos','id'));
    }

    public function store(GeneroRequest $request)
    {
        $generos = GeneroMascota::create([
            'genero_mascota' => $request->genero_mascota
        ]);
        if ($generos){
            session()->flash('mensaje', ['success', 'El género se ha registrado correctamente.']);
            return redirect()->route('genero.create');
        
            session()->flash('mensaje', ['danger', 'Se ha producido un error al registrar el género.']);
            return redirect()->route('genero.create');
           }    
    }

    public function edit(GeneroMascota $id)
    {
        $generos = GeneroMascota::all();
        return view('genero.edit',compact(['generos','id']));
    }

    public function update(GeneroMascota $id, GeneroRequest $request)
    {
        
        $update = $id->update([
            'genero_mascota'=> $request->genero_mascota
        ]);

        if ($update){
            session()->flash('mensaje', ['success', 'Los datos del género se han modificado correctamente.']);
            return redirect()->route('genero.create');
        }
            session()->flash('mensaje', ['danger', 'Se ha producido un error al modificar los datos del género.']);
            return redirect()->route('genero.create');
    }

    public function delete(GeneroMascota $info)
    {
        try {
            if ($info->delete()){
                session()->flash('mensaje', ['success', 'Se elimino el género']);
                return redirect()->route('genero.create');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar el género']);
            return redirect()->route('genero.create');

        } catch( \Exception $e) {
            abort(403);
        }
    }

    public function restore($info) {
        try {
            if (GeneroMascota::withTrashed()->findOrFail($info)->restore() ){
                session()->flash('mensaje', ['success', 'Se recuperó el género.']);
                return redirect()->route('genero.create');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar el género.']);
            return redirect()->route('home');

        } catch( \Exception $e) {
            abort(403);
        }
    }
    
}

