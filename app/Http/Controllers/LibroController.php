<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use App\Models\Movement;
use Illuminate\Http\Request;

/**
* Class LibroController
* @package App\Http\Controllers
*/
class LibroController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $libros = Libro::paginate();
        
        return view('libro.index', compact('libros'))
        ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $libro = new Libro();
        $categoria= Categoria::pluck('nombre','id');
        return view('libro.create', compact('libro','categoria'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        request()->validate(Libro::$rules);
        $stockMovimiento = $request->get('stock');

        $libro = Libro::create($request->all());
        $movimiento = Movement::create(
            [
                "id_libro" => $libro->id,
                "ingreso" => $stockMovimiento,
                "type" => "Creación del producto"
            ]
            );

        return redirect()->route('libros.index')
        ->with('success', 'Libro creado con éxito.');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $libro = Libro::find($id);
        
        return view('libro.show', compact('libro'));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $libro = Libro::find($id);
        $categoria= Categoria::pluck('nombre','id');
        return view('libro.edit', compact('libro', 'categoria', 'id'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  Libro $libro
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Libro $libro)
    {
        request()->validate([
            'categoria_id' => 'required',
            'nombre' => 'required']);
        $libro->update($request->all());
        
        return redirect()->route('libros.index')
        ->with('success', 'Libro actualizado con éxito');
    }
    
    /**
    * @param int $id
    * @return \Illuminate\Http\RedirectResponse
    * @throws \Exception
    */
    public function destroy($id)
    {
        $libro = Libro::find($id)->delete();
        return redirect()->route('libros.index')
        ->with('success', 'Libro eliminado con éxito');
    }
}
