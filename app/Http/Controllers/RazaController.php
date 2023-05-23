<?php

namespace App\Http\Controllers;

use App\Http\Requests\RazaRequest;
use App\Models\Mascota;
use App\Models\Raza;
use Illuminate\Http\Request;

class RazaController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $razas = Raza::all();
        $id=new Mascota();
        return view('raza.create',compact('razas','id'));
    }

    public function store(RazaRequest $request)
    {
        $razas = Raza::create([
            'raza_mascota' => $request->raza_mascota
        ]);
        if ($razas){
            session()->flash('mensaje', ['success', 'La Raza se ha registrado correctamente']);
            return redirect()->route('raza.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar la Raza']);
            return redirect()->route('raza.create');
           }    
    }

    public function edit(Raza $id)
    {
        $razas = Raza::all();
        return view('raza.edit',compact(['razas','id']));
    }

    public function update(Raza $id, RazaRequest $request)
    {
        
        $update = $id->update([
            'raza_mascota'=> $request->raza_mascota
        ]);

        if ($update){
            session()->flash('mensaje', ['success', 'Los datos de la raza se ha modificado correctamente']);
            return redirect()->route('raza.create');
        }
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al modificar los datos de Raza']);
            return redirect()->route('raza.create');
    }

    public function destroy($id)
    {
        //
    }
}
