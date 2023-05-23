<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistorialRequest;
use App\Models\HistorialMedico;
use Illuminate\Http\Request;

class HistorialMedicoController extends Controller
{
  
    public function index()
    {
       $historiales=HistorialMedico::all(); 
       return view('home', compact(['historiales']));
    }

    public function create()
    {
        return view('historial.create'); 
    }


    public function store(HistorialRequest $request)
    {
        $historiales = HistorialMedico::create([
            'vacuna' => $request->vacuna,
            'enfermedades' => $request->enfermedades,
            'comentarios' => $request->comentarios,
          
           ]);
           if ($historiales){
            return view('home');
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
