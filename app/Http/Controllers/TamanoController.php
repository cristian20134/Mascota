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
        $tamanos = Tamano::withTrashed()->get();
        $id=new Mascota();
        return view('tamano.create',compact(['tamanos','id']));
    }


    public function store(TamanoRequest $request)
    {
        $tamanos = Tamano::create([
            'tamano_mascota' => $request->tamano_mascota
        ]);
        
        if ($tamanos){
            session()->flash('mensaje', ['success', 'El tamaño se ha registrado correctamente.']);
            return redirect()->route('tamano.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar el tamaño.']);
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
            session()->flash('mensaje', ['success', 'Los datos del tamaño se han modificado correctamente.']);
            return redirect()->route('tamano.create');
        }
            session()->flash('mensaje', ['danger', 'Se ha producido un error al modificar los datos del tamaño.']);
            return redirect()->route('tamano.create');
    }

    public function delete(Tamano $info)
    {
        try {
            if ($info->delete()){
                session()->flash('mensaje', ['success', 'Se elimino el tamaño']);
                return redirect()->route('tamano.create');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar tamaño']);
            return redirect()->route('tamano.create');

        } catch( \Exception $e) {
            abort(403);
        }
    }

    public function restore($info) {
        try {
            if (Tamano::withTrashed()->findOrFail($info)->restore() ){
                session()->flash('mensaje', ['success', 'Se recuperó el tamaño.']);
                return redirect()->route('tamano.create');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar el tamaño']);
            return redirect()->route('tamano.create');

        } catch( \Exception $e) {
            abort(403);
        }
    }

}