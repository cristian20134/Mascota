<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdopcionController extends Controller
{
  
    public function __construct( )
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('adopcion.index');
    }


    public function create()
    {
        $usuarios = Usuario::all();
        $mascotas = Mascota::all();
        return view('adopcion.create',compact(['usuarios','mascotas']));
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
