<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistorialRequest;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $historiales = HistorialMedico::withTrashed()->paginate(8);
       return view('historial.index', compact(['historiales']));
    }

    public function create()
    {
        return view('historial.create'); 
    }


    public function store(HistorialRequest $request)
    {
        $historiales = HistorialMedico::create([
            'nombre_ficha'=>$request->nombre_ficha,
            'vacuna' => $request->vacuna,
            'enfermedades' => $request->enfermedades,
            'comentarios' => $request->comentarios,
          
           ]);

            if ($historiales){
            session()->flash('mensaje', ['success', 'El historial medico mascota se ha registrado correctamente.']);
            return redirect()->route('historial.create');
        
            session()->flash('mensaje', ['danger', 'Se ha producido un error al registrar el historial medico mascota.']);
            return redirect()->route('home');
           }   
    }
    

    public function show(HistorialMedico $his)
    {
        return view('historial.show', compact(['his'])); 
    }


    public function edit(HistorialMedico $his)
    {
        return view('historial.edit', compact(['his'])); 
    }


    public function update(HistorialMedico $his, HistorialRequest $request)
    {
        $update = $his->update([
            'nombre_ficha'=>$request->nombre_ficha,
            'vacuna' => $request->vacuna,
            'enfermedades' => $request->enfermedades,
            'comentarios' => $request->comentarios,
          ]);
    
          if ($update){
            session()->flash('mensaje', ['success', 'Los datos del historial medico mascota se han modificado correctamente.']);
            return redirect()->route('historial.create');
        
            session()->flash('mensaje', ['danger', 'Se ha producido un error al modificar los datos del historial medico mascota.']);
            return redirect()->route('home');
           }    
     }
    
     public function delete(HistorialMedico $his)
     {
         try {
             if ($his->delete()){
                 session()->flash('mensaje', ['success', 'Se elimino el historial medico mascota.']);
                 return redirect()->route('historial.index');
             }
             session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar el historial medico mascota.']);
             return redirect()->route('historial.index');
 
         } catch( \Exception $his) {
             abort(403);
         }
     }
 
     public function restore($his) {
         try {
             if (HistorialMedico::withTrashed()->findOrFail($his)->restore() ){
                 session()->flash('mensaje', ['success', 'Se recuperó el historial medico mascota.']);
                 return redirect()->route('historial.index');
             }
             session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar el historial medico mascota.']);
             return redirect()->route('home');
 
         } catch( \Exception $his) {
             abort(403);
         }
     }
 
 }
