<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    //relacion uno a muchos inversa
    public function Almacen(){
        return $this->belongsToMany(Stock::class);
    }

    //relacion uno a muchos inversa
    public function Tipos(){
        return $this->belongsToMany(TipoMovimiento::class);
    }

    //relacion uno a uno
/*     public function Products(){
        return $this->belongsTo(Product::class);
    } */

}
