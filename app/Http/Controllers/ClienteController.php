<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes =  Cliente::orderBy('id','DESC')->paginate(10);
        return response()->json($clientes);
    }

    public function show($id_cliente)
    {
        $cliente = Cliente::where('id', $id_cliente)->first();
        return response()->json($cliente);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:100',
                'email' => 'required',
                'celular' => 'required',
            ]
        );
        $cliente =  Cliente::create([
            'name' => $request->name,
            'email' => $request->email,
            'celular' => $request->celular,
        ]);

        return response()->json($cliente);
    }

    public function edit(Request $request, $id_cliente)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:100',
                'email' => 'required',
                'celular' => 'required',
            ]
        );

        $cliente = Cliente::find($id_cliente);
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->save();
        return response()->json($cliente);
    }

    public function delete($id_cliente)
    {
        //  dd($id_cliente);
        $cliente = Cliente::find($id_cliente);
        $cliente->delete();
        return response()->json($id_cliente);
    }
}
