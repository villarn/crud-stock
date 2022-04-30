<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
     /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($id)
    {
        $movimiento = new Movement();
        return view('movement.create', compact('movimiento', 'id'));
    }

        /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request, $id)
    {
        $tipoMov = $request->get('type');
        /*
        1- Venta - egreso
        2-Compra -ing
        3- Cancelación -ing
        */ 

        $cantidad = $request->get('cantidad');

        $movimiento = Movement::create(
            [
                "id_libro" => $id,
                "ingreso" => $tipoMov == 1? null: $cantidad,
                "egreso" => $tipoMov == 1?  $cantidad : null,
                "type" => $request->get('type') == 1? 
                    "Venta" : ($request->get('type') == 2? "Compra": "Cancelación")
            ]
            );

        return redirect()->route('libros.index')
        ->with('success', 'Movimiento creado con éxito');
    }
}
