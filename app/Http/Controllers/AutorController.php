<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autores =  Autor::all();
        return response()->json($autores);
    }

    public function show($id_autor)
    {

        $autor = Autor::where('id', $id_autor)->with('libros')->first();
        return response()->json($autor);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:100',
            ]
        );
        $autor =  Autor::create([
            'name' => $request->name
        ]);

        return response()->json($autor);
    }

    public function edit(Request $request, $id_autor)
    {
        $autor = Autor::find($id_autor);
        $autor->name = $request->name;
        $autor->save();
        return response()->json($autor);
    }

    public function delete($id_autor)
    {
        //  dd($id_autor);
        $autor = Autor::find($id_autor);
        $autor->delete();
        return response()->json($id_autor);
    }
}
