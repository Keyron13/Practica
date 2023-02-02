<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        if(empty($request->nombre)){
            return response()->json(['Message' => 'No se permiten campos vacios', 'code' => 406]);
        }

        Persona::create([
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'cedula'=>$request->cedula
        ]);
        return response()->json(['Message' => 'Registro correcto', 'code' => 201]);
    }


    public function show(Persona $persona)
    {
        $persona = Persona::all();
        return response()->json(['Persona' => $persona]);
    }

    public function shows($id)
    {
        $persona = Persona::find($id);
        if(empty($persona)){
            return response()->json(['Message' => 'Registro no encontrado', 'code'=> 404]);
        }
        return response()->json(['Persona' => $persona, 'code'=> 404]);
    }


    public function edit(Persona $persona)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);

        if(empty($persona)){
            return response()->json(['Message' => 'No se permiten campos vacios', 'code' => 406]);
        }
        Persona::where('id',$id)
            ->update([
                'nombre'=>$request->nombre,
                'apellido'=>$request->apellido,
                'cedula'=>$request->cedula
            ]);
        return response()->json(['Message' => 'Registro correcto', 'code' => 201]);
    }


    public function delete($id)
    {
        $persona = Persona::find($id);
        if(empty($persona)){
            return response()->json(['Message' => 'Registro no encontrado', 'code' => 404]);
        }
        $persona->delete();
        return response()->json(['Message'=>'Registro eliminado', 'code' => 200]);
    }
}
