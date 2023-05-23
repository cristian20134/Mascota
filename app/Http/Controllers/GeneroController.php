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
        $generos = GeneroMascota::all();
        $id= new Mascota();
        return view('genero.create',compact('generos','id'));
    }

    public function store(GeneroRequest $request)
    {
        $generos = GeneroMascota::create([
            'genero_mascota' => $request->genero_mascota
        ]);
        if ($generos){
            session()->flash('mensaje', ['success', 'El Genero se ha registrado correctamente']);
            return redirect()->route('genero.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar el Genero']);
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
            session()->flash('mensaje', ['success', 'Los datos del Genero se han modificado correctamente']);
            return redirect()->route('genero.create');
        }
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al modificar los datos del Genero']);
            return redirect()->route('genero.create');
    }

    public function destroy($id)
    {
        //
    }
}

