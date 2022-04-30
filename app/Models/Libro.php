<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

/**
 * Class Libro
 *
 * @property $id
 * @property $categoria_id
 * @property $nombre
 * @property $stock
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Libro extends Model
{
  
    static $rules = [
		'categoria_id' => 'required',
		'nombre' => 'required',
    'stock' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    use HasFactory;
    protected $fillable = ['categoria_id','nombre', 'stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movimientosStock()
    {
        return $this->hasMany('App\Models\Movement', 'id_libro', 'id');
    }

    public function calcularStockActual()
    { 
        $sqlI = "SELECT SUM(ingreso) as total FROM movements where id_libro = $this->id";
        $sqlE = "SELECT SUM(egreso)  as total FROM movements where id_libro = $this->id";
        
        $dataI = DB::select(DB::raw($sqlI)); 
        $dataE = DB::select(DB::raw($sqlE)); 

        $stockActual = ($dataI[0]->total ?? 0 ) - ($dataE[0]->total ?? 0);

        return json_encode($stockActual);

    }
   


}
