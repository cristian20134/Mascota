<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeguimientoRequest;
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
        $seguimientos = Seguimiento::withTrashed()->get();
        $segu = Seguimiento::paginate(2);
        return view('seguimiento.index',compact(['seguimientos','segu']));
    }

    public function create()
    {
        $adopciones = Adopcion::all();
        return view('seguimiento.create',compact(['adopciones']));
    }

    public function store(SeguimientoRequest $request)
    {
        $seguimientos = Seguimiento::create([
            'adopcion_id' =>$request->select_seguimiento,
            'estado_mascota' =>$request->estado_mascota,
            'fecha_seguimiento' =>$request->fecha_seguimiento,
            'descripcion_seguimiento'=>$request->descripcion_seguimiento
        ]);

        if ($seguimientos){
            session()->flash('mensaje', ['success', 'El seguimniento se ha registrado correctamente.']);
            return redirect()->route('seguimiento.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar el seguimiento.']);
            return redirect()->route('seguimiento.create');
           }
    }
   
    public function show(Seguimiento $seg)
    {
        return view('seguimiento.show', compact(['seg']));
    }

  
    public function edit(Seguimiento $seg)
    {
        $adopciones = Adopcion::all();
        return view('seguimiento.edit',compact(['adopciones', 'seg']));
    }

    public function update(Seguimiento $seg, SeguimientoRequest $request)
    {
        $update = $seg->update([
            'adopcion_id' =>$request->select_seguimiento,
            'estado_mascota' =>$request->estado_mascota,
            'fecha_seguimiento' =>$request->fecha_seguimiento,
            'descripcion_seguimiento'=>$request->descripcion_seguimiento
          ]);
    
          if ($update){
            session()->flash('mensaje', ['success', 'Los datos del seguimiento se han modificado correctamente.']);
            return redirect()->route('seguimiento.create');
        
            session()->flash('mensaje', ['danger', 'Se ha producido un error al modificar los datos del seguimiento.']);
            return redirect()->route('home');
           }    
        }

        public function delete(Seguimiento $seg)
        {
            try {
                if ($seg->delete()){
                    session()->flash('mensaje', ['success', 'Se elimino el seguimiento correctamente.']);
                    return redirect()->route('seguimiento.index');
                }
                session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar el seguimiento']);
                return redirect()->route('seguimiento.index');
    
            } catch( \Exception $seg) {
                abort(403);
            }
        }
    
        public function restore($seg) {
            try {
                if (Seguimiento::withTrashed()->findOrFail($seg)->restore() ){
                    session()->flash('mensaje', ['success', 'Se recuperó el seguimiento correctamente.']);
                    return redirect()->route('seguimiento.index');
                }
                session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar el seguimiento.']);
                return redirect()->route('seguimiento.index');
    
            } catch( \Exception $seg) {
                abort(403);
            }
        }
    
    }
    
