<?php
   
namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

   
class AutoCompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('libro.index');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $res = Libro::select("nombre")
                ->where("nombre","LIKE","%{$request->term}%")
                ->get();
    
        return response()->json($res);
    }
}

