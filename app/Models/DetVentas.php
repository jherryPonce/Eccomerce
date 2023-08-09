<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetVentas extends Model
{
    use HasFactory;

    protected $table = "detalleventa";
    protected $guarded = ['id','created_at','updated_at', 'status'];

    const ENTREGADO = 1;
    const ANULADO = 2;
    /* Relacion uno a muchos inversa */
   /*  public function products(){
        return $this->belongsTo(Product::class);
    } */
    public function ventas(){
        return $this->belongsTo(Venta::class);
    }
  
}
