<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all(); 
        return response()->json(['success' => true,
            'data' => $clientes,
            'message' => 'Operacion Correcta'], 200);
    }

    public function create()
    {
        $clientes = new \stdClass();

        $clientes->name = $request->input('titulo');
        $clientes->apellido = $request->input('descripcion');
        $clientes->fecha_nacimiento = $request->input('fecha de naciemiento');
        $clientes->dni = $request->input('DNI');
        $clientes->edad = $request->input('Edad');
        $clientes->email = $request->input('Email');

        clientes::create($request->all());
        return response()->json(
            ['success' => true,
                'data' => $this->index(),
                'message' => 'Operacion Correcta'],
            201);
    }
    public function show($id)
    {
        //
        $clientes= Clientes::find($id);
        echo "$clientes->nombre<br>";
        echo "$clientes->apellido<br>";
        echo "$clientes->telefono<br>";
        echo "$clientes->direccion<br>";
        
    }

    public function update(Request $request, $id)
    {
        clientes::find($id)->update($request->all());
        return response()->json(
            ['success' => true,
                'data' => $this->index(),
                'message' => 'Operacion Correcta'],
            201);
    }

    public function destroy($id)
    {
        clientes::find($id)->delete();
        return response()->json(
            ['success' => true,
                'data' => $this->index(),
                'message' => 'Operacion Correcta'],
            201);
    }
}
