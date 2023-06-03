<?php

namespace App\Http\Controllers;

use App\Http\Requests\MascotaRequest;
use App\Models\GeneroMascota;
use App\Models\HistorialMedico;
use App\Models\Mascota;
use App\Models\PersonalidadMascota;
use App\Models\Raza;
use App\Models\Tamano;
use Carbon\PHPStan\MacroExtension;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $mascotas = Mascota::withTrashed()->get();
        $mas = Mascota::paginate(2);
        return view('mascota.index', compact('mascotas','mas'));
    }

   
    public function create()
    {
        $razas = Raza::all();
        $generos = GeneroMascota::all();
        $personalidades = PersonalidadMascota::all();
        $tamanos = Tamano::all();
        $historiales = HistorialMedico::all();
        return view('mascota.create', compact('razas','generos','personalidades','tamanos','historiales'));
    }

  
    public function store(MascotaRequest $request)
    {
        $mascotas = Mascota::create([
            'historial_medico_id' =>$request->historial_medico,
            'raza_id' =>$request->select_raza,
            'tamano_id' =>$request->tamano,
            'genero_mascota_id' =>$request->genero_mascota,
            'personalidad_mascota_id' =>$request->personalidad_mascota,
            'nombre_mascota'=>$request->nombre_mascota,
            'fecha_nacimiento_mascota' =>$request->fecha_nacimiento_mascota,
            'comentario_mascota'=>$request->comentario_mascota
        ]);

        if ($mascotas){
            session()->flash('mensaje', ['success', 'La mascota se ha registrado correctamente.']);
            return redirect()->route('mascota.create');
        
            session()->flash('mensaje', ['danger', 'Se ha Producido un error al registrar la Mascota.']);
            return redirect()->route('mascota.create');
           }    
    }

  
    public function show(Mascota $m)
    {
        return view('mascota.show', compact(['m']));
    }

 
    public function edit(Mascota $m)
    {
        $razas = Raza::all();
        $generos = GeneroMascota::all();
        $personalidades = PersonalidadMascota::all();
        $tamanos = Tamano::all();
        $historiales = HistorialMedico::all();
        return view('mascota.edit', compact('razas','generos','personalidades','tamanos','historiales','m'));
    }


    public function update(Mascota $m, MascotaRequest $request )
    {
      $update = $m->update([
        'historial_medico_id' =>$request->historial_medico,
            'raza_id' =>$request->select_raza,
            'tamano_id' =>$request->tamano,
            'genero_mascota_id' =>$request->genero_mascota,
            'personalidad_mascota_id' =>$request->personalidad_mascota,
            'nombre_mascota'=>$request->nombre_mascota,
            'fecha_nacimiento_mascota' =>$request->fecha_nacimiento_mascota,
            'comentario_mascota'=>$request->comentario_mascota
      ]);

      if ($update){
        session()->flash('mensaje', ['success', 'Los datos de la mascota se han modificado correctamente.']);
        return redirect()->route('mascota.create');
    
        session()->flash('mensaje', ['danger', 'Se ha Producido un error al Modificar los datos de la Mascota.']);
        return redirect()->route('mascota.create');
       }    
    }

    public function delete(Mascota $m)
    {
        try {
            if ($m->delete()){
                session()->flash('mensaje', ['success', 'Se elimino la mascota.']);
                return redirect()->route('mascota.index');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar la mascota']);
            return redirect()->route('mascota.index');

        } catch( \Exception $e) {
            abort(403);
        }
    }

    public function restore($m) {
        try {
            if (Mascota::withTrashed()->findOrFail($m)->restore() ){
                session()->flash('mensaje', ['success', 'Se recuperó la mascota..']);
                return redirect()->route('mascota.index');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar la mascota']);
            return redirect()->route('mascota.index');

        } catch( \Exception $e) {
            abort(403);
        }
    }

}
