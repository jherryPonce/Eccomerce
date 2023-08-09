<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];
    const Online = 1;
    const Tienda = 2;
   /*  public function products(){
        return $this->belongsToMany(Product::class);
    } */
    public function detalles(){
        return $this->hasMany(DetVentas::class);
    }
    public function orden(){
        return $this->hasMany(Order::class);
    }
}
