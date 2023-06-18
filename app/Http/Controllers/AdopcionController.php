<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdopcionRequest;
use App\Models\Adopcion;
use App\Models\Mascota;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AdopcionController extends Controller
{
  
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $adopciones = Adopcion::withTrashed()
        ->paginate(5);
        return view('adopcion.index',compact(['adopciones']));
    }


    public function create()
    {
        $usuarios = Usuario::all();
        $mascotas = Mascota::all();
        return view('adopcion.create',compact(['usuarios','mascotas']));
    }

    public function store(AdopcionRequest $request)
    {
        $adopciones = Adopcion::create([
            'usuario_id' =>$request->select_usuario,
            'mascota_id' =>$request->select_mascota,
            'nombre_cuidad' =>$request->nombre_cuidad,
            'fecha_adopcion' =>$request->fecha_adopcion,
            'direccion_adopcion' =>$request->direccion_adopcion,
            'descripcion_adopcion'=>$request->descripcion_adopcion
        ]);

        if ($adopciones){
            session()->flash('mensaje', ['success', 'La adopción se ha registrado correctamente.']);
            return redirect()->route('adopcion.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar la adopción.']);
            return redirect()->route('adopcion.create');
           }  
    }

   
    public function show(Adopcion $info)
    {
        return view('adopcion.show', compact(['info']));
    }

    public function edit(Adopcion $info)
    {
        $usuarios = Usuario::all();
        $mascotas = Mascota::all();
        return view('adopcion.edit',compact(['usuarios','mascotas','info']));
    }

    public function update(Adopcion $info, AdopcionRequest $request)
    {
        $update = $info->update([
            'usuario_id' =>$request->select_usuario,
            'mascota_id' =>$request->select_mascota,
            'nombre_cuidad' =>$request->nombre_cuidad,
            'direccion_adopcion' =>$request->direccion_adopcion,
            'fecha_adopcion' =>$request->fecha_adopcion,
            'descripcion_adopcion'=>$request->descripcion_adopcion
          ]);
    
          if ($update){
            session()->flash('mensaje', ['success', 'Los datos de la adopción se han modificado correctamente.']);
            return redirect()->route('adopcion.show', ['info'=>$info->id]);
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al Modificar los datos de la adopción.']);
            return redirect()->route('home');
           }    
        }
    
        public function delete(Adopcion $info)
        {
            try {
                if ($info->delete()){
                    session()->flash('mensaje', ['success', 'Se elimino la adopción.']);
                    return redirect()->route('adopcion.index');
                }
                session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar la adopción']);
                return redirect()->route('adopcion.index');
    
            } catch( \Exception $info) {
                abort(403);
            }
        }
    
        public function restore($info) {
            try {
                if (Adopcion::withTrashed()->findOrFail($info)->restore() ){
                    session()->flash('mensaje', ['success', 'Se recuperó la adopción.']);
                    return redirect()->route('adopcion.index');
                }
                session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar la adopción.']);
                return redirect()->route('adopcion.index');
    
            } catch( \Exception $info) {
                abort(403);
            }
        }

        public function pdf( Adopcion $info)
        {
            $pdf = PDF::loadview('adopcion.pdf', compact(['info']));
            return $pdf->stream();
        }
    
    }