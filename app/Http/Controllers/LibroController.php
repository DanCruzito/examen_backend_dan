<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    public function index()
    {
        $libros =  Libro::orderBy('id','DESC')->paginate(10);
        return response()->json($libros);
    }

    public function show($id_libro)
    {
        $libro = Libro::where('id', $id_libro)->with('autor')->first();
        return response()->json($libro);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'titulo' => 'required|string|max:100',
                'lote' => 'required',
                'descripcion' => 'required',
                'autor_id' => 'required',
            ]
        );
        $libro =  Libro::create([
            'titulo' => $request->titulo,
            'lote' => $request->lote,
            'description' => $request->descripcion,
            'autor_id' => $request->autor_id
        ]);

        return response()->json($libro);
    }

    public function edit(Request $request, $id_libro)
    {
        $this->validate(
            $request,
            [
                'titulo' => 'required|string|max:100',
                'lote' => 'required',
                'description' => 'required',
                'autor_id' => 'required',
            ]
        );

        $libro = Libro::find($id_libro);
        $libro->titulo = $request->titulo;
        $libro->lote = $request->lote;
        $libro->description = $request->description;
        $libro->autor_id = $request->autor_id;
        $libro->save();
        return response()->json($libro);
    }

    public function delete($id_libro)
    {
        //  dd($id_libro);
        $libro = Libro::find($id_libro);
        $libro->delete();
        return response()->json($id_libro);
    }

    public function libros_vencidos(){
        $libros =  DB::table('prestamos','p')
                  ->select('*')
                  ->join('libros as l','l.id','=','p.libro_id')
                  ->where('p.fecha_prestamo','<',Carbon::now())->get();
        return response()->json($libros);
    }
}
