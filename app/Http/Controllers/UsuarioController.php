<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use UnitEnum;

class UsuarioController extends Controller
{
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = Usuario::withTrashed()->get();
        $us = Usuario::paginate(2);
        return view('usuario.index', compact(['usuarios','us']));
    }

    public function create()
    {
        
        return view('usuario.create');
    }

    public function store( UsuarioRequest $request )
    {  
           $usuarios = Usuario::create([
            'nombre_usuario' => $request->nombre_usuario,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'rut_usuario' => $request->rut_usuario,
            'email_usuario' => $request->email_usuario,
            'telefono_usuario' => $request->telefono_usuario,
            ]);
          
            if ($usuarios){
                session()->flash('mensaje', ['success', 'El usuario se ha registrado correctamente.']);
                return redirect()->route('usuario.index');
            
                session()->flash('mensaje', ['danger', 'Se ha Producido un error al momento de registrar un usuario.']);
                return redirect()->route('usuario.create');
               }      
    }

    public function show(Usuario $u)
    {
        return view('usuario.show', compact(['u'])); 
    }

   
    public function edit(Usuario $u)
    {
        return view('usuario.edit', compact(['u']));
    }

  
    public function update(Usuario $u, UsuarioRequest $request)
    {
     $update = $u->update([
        'nombre_usuario' => $request->nombre_usuario,
        'apellido_paterno' => $request->apellido_paterno,
        'apellido_materno' => $request->apellido_materno,
        'rut_usuario' => $request->rut_usuario,
        'email_usuario' => $request->email_usuario,
        'telefono_usuario' => $request->telefono_usuario,
      ]);

      if ($update){
        session()->flash('mensaje', ['success', 'Los datos del usuario se han modificado correctamente.']);
        return redirect()->route('usuario.show', ['u'=>$u->id]);
    
        session()->flash('mensaje', ['danger', 'Se ha Producido un error al Modificar los datos del usuario.']);
        return redirect()->route('usuario.create');
       }  
    }

    public function delete(Usuario $u)
    {
        try {
            if ($u->delete()){
                session()->flash('mensaje', ['success', 'Se elimino el usuario']);
                return redirect()->route('usuario.index');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al eliminar usuario']);
            return redirect()->route('usuario.index');

        } catch( \Exception $e) {
            abort(403);
        }
    }

    public function restore($u) {
        try {
            if (Usuario::withTrashed()->findOrFail($u)->restore() ){
                session()->flash('mensaje', ['success', 'Se recuperó el usuario.']);
                return redirect()->route('usuario.index');
            }
            session()->flash('mensaje', ['danger', 'Se produjo un ERROR al recuperar el usuario']);
            return redirect()->route('home');

        } catch( \Exception $e) {
            abort(403);
        }
    }

}
