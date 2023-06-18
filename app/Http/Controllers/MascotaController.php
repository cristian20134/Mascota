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
        $mascotas = Mascota::query()
        ->withTrashed()
        ->when(request('search'), function($query){
            return $query->where('nombre_mascota','like','%'.request('search').'%')
            ->orWhereHas('raza', function ($q){
                $q->where('raza_mascota', 'like','%'.request('search').'%');
            });
        })
        ->paginate(5)
        ->withQueryString();
        return view('mascota.index', compact('mascotas'));
    }
   
    public function create()
    {
        $razas = Raza::all();
        $generos = GeneroMascota::all();
        $personalidades = PersonalidadMascota::all();
        $tamanos = Tamano::all();
        return view('mascota.create', compact('razas','generos','personalidades','tamanos'));
    }

  
    public function store(MascotaRequest $request)
    {
        if ( $request->hasFile('image_mascota')) {
            $extension_archivo = $request->file('image_mascota')->getClientOriginalExtension();
            $ruta_archivo = "uploads/mascotas/";
            $nombre_archivo = date('YmdHis'). "." . $extension_archivo;
            $subida_archivo = $request->file('image_mascota')->move($ruta_archivo, $nombre_archivo);

            }

        $mascotas = Mascota::create([
            'raza_id' =>$request->select_raza,
            'tamano_id' =>$request->tamano,
            'genero_mascota_id' =>$request->genero_mascota,
            'personalidad_mascota_id' =>$request->personalidad_mascota,
            'nombre_mascota'=>$request->nombre_mascota,
            'fecha_nacimiento_mascota' =>$request->fecha_nacimiento_mascota,
            'comentario_mascota'=>$request->comentario_mascota,
            'image_mascota'=> ( $ruta_archivo . $nombre_archivo )
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
        return view('mascota.edit', compact('razas','generos','personalidades','tamanos','m'));
    }


    public function update(Mascota $m, MascotaRequest $request )
    {
        if ( $request->hasFile('image_mascota')) {
                $ruta_archivo = "uploads/mascotas/";

                if($m->image_mascota != ''  && $m->image_mascota != null){
                    $file_old =$m->image_mascota;
                    unlink($file_old);
            }
            }
                if ( $request->hasFile('image_mascota')) {
                    $extension_archivo = $request->file('image_mascota')->getClientOriginalExtension();
                    $ruta_archivo = "uploads/mascotas/";
                    $nombre_archivo = date('YmdHis'). "." . $extension_archivo;
                    $subida_archivo = $request->file('image_mascota')->move($ruta_archivo, $nombre_archivo);
        
                    }
        
                    $update = $m->update([
                        'raza_id' =>$request->select_raza,
                        'tamano_id' =>$request->tamano,
                        'genero_mascota_id' =>$request->genero_mascota,
                        'personalidad_mascota_id' =>$request->personalidad_mascota,
                        'nombre_mascota'=>$request->nombre_mascota,
                        'fecha_nacimiento_mascota' =>$request->fecha_nacimiento_mascota,
                        'comentario_mascota'=>$request->comentario_mascota,
                        'image_mascota'=> ( $ruta_archivo . $nombre_archivo )
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
