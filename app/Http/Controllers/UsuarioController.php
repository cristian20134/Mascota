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
        $usuarios = Usuario::query()
        ->orderBy('id','DESC')
        ->withTrashed()
        ->when(request('search'), function($query){
            return $query->where('nombre_usuario','like','%'.request('search').'%')
                ->orWhere('apellido_paterno','like','%'.request('search').'%')
                ->orWhere('apellido_materno','like','%'.request('search').'%')
                ->orWhere('email_usuario','like','%'.request('search').'%');
        })
        ->paginate(5)
        ->withQueryString();
        return view('usuario.index', compact(['usuarios']));
    }

    public function create()
    {

        return view('usuario.create');
    }

    public function store( UsuarioRequest $request )
    {
        if ( $request->hasFile('image_usuario')) {

            $peso_archivo = $request->file('image_usuario')->getSize();
            $extension_archivo = $request->file('image_usuario')->getClientOriginalExtension();

            $ruta_archivo = "uploads/usuarios/";
            $nombre_archivo = date('YmdHis'). "." . $extension_archivo;

            $subida_archivo = $request->file('image_usuario')->move($ruta_archivo, $nombre_archivo);

            }

            $usuarios = Usuario::create([
                'nombre_usuario' => $request->nombre_usuario,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'rut_usuario' => $request->rut_usuario,
                'email_usuario' => $request->email_usuario,
                'telefono_usuario' => $request->telefono_usuario,
                'image_usuario' => ( $ruta_archivo . $nombre_archivo ),
                ]);

                if ($usuarios){
                    session()->flash('mensaje', ['success', 'El usuario se ha registrado correctamente.']);
                    return redirect()->route('usuario.create');

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

        if ( $request->hasFile('image_usuario')) {
                $ruta_archivo = "uploads/usuarios/";

                if($u->image_usuario != ''  && $u->image_usuario != null){
                    $file_old =$u->image_usuario;
                    unlink($file_old);
                }
            }

            if ( $request->hasFile('image_usuario')) {
                $peso_archivo = $request->file('image_usuario')->getSize();
                $extension_archivo = $request->file('image_usuario')->getClientOriginalExtension();
                $ruta_archivo = "uploads/usuarios/";
                $nombre_archivo = date('YmdHis'). "." . $extension_archivo;
                $subida_archivo = $request->file('image_usuario')->move($ruta_archivo, $nombre_archivo);
                }

            $update = $u->update([
                'nombre_usuario' => $request->nombre_usuario,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'rut_usuario' => $request->rut_usuario,
                'email_usuario' => $request->email_usuario,
                'telefono_usuario' => $request->telefono_usuario,
                'image_usuario' => ( $ruta_archivo . $nombre_archivo),
            ]);

            if ($update){
                session()->flash('mensaje', ['success', 'Los datos del usuario se han modificado correctamente.']);
                return redirect()->route('usuario.show', ['u'=>$u->id]);

                session()->flash('mensaje', ['danger', 'Se ha producido un error al modificar los datos del usuario.']);
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
