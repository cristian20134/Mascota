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
        $usuarios = Usuario::paginate(2);
        return view('usuario.index', compact(['usuarios']));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('usuario.create', compact(['usuarios']));
    }

    public function store( UsuarioRequest $request)
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
                session()->flash('mensaje', ['success', 'El Usuario se ha registrado correctamente']);
                return redirect()->route('usuario.index');
            
                session()->flash('mensaje', ['danger', 'Se ha Producido un error al momento de registrar un Usuario']);
                return redirect()->route('usuario.create');
               }      
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy($id)
    {
        //
    }
}
