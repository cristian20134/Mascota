<?php

namespace App\Http\Controllers;

use App\Http\Requests\TamanoRequest;
use App\Models\Mascota;
use App\Models\Tamano;
use Illuminate\Http\Request;

class TamanoController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function index()
    {
    
    }


    public function create()
    {
        $tamanos = Tamano::all();
        $id=new Mascota();
        return view('tamano.create',compact(['tamanos','id']));
    }


    public function store(TamanoRequest $request)
    {
        $tamanos = Tamano::create([
            'tamano_mascota' => $request->tamano_mascota
        ]);
        
        if ($tamanos){
            session()->flash('mensaje', ['success', 'La Raza se ha registrado correctamente']);
            return redirect()->route('tamano.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar la Raza']);
            return redirect()->route('tamano.create');
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
    public function edit(Tamano $id)
    {
        $tamanos = Tamano::all();
        return view('tamano.edit',compact(['tamanos','id']));
    }

    public function update(Tamano $id, TamanoRequest $request)
    {
        
        $update = $id->update([
            'tamano_mascota'=> $request->tamano_mascota
        ]);

        if ($update){
            session()->flash('mensaje', ['success', 'Los datos de la raza se ha modificado correctamente']);
            return redirect()->route('tamano.create');
        }
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al modificar los datos de Raza']);
            return redirect()->route('tamano.create');
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
