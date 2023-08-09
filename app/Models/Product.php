<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const borrador=1;
    const publicado=2;
    protected $guarded = ['id','created_at','updated_at'];
/* Accesor debe iniciar con get seguido el nombre que del campo que se tomara y terminado en attribute */
/* esto nos indicara que tipo de producto es, ya sea que necesite talla o color */
   public function getStockAttribute(){
        if ($this->subcategory->size) {
            return  ColorSize::whereHas('size.product', function(Builder $query){
                        $query->where('id', $this->id);
                    })->sum('quantity');
        } elseif($this->subcategory->color) {
            return  ColorProduct::whereHas('product', function(Builder $query){
                        $query->where('id', $this->id);
                    })->sum('quantity');
        }else{

            return $this->quantity;

        }
        
    }
    //relacion uno a muchos inversa
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    //relacion uno a muchos inversa
    public function Subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    //relacion muchos a muchos 
    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity','id');
    }

    //relacion uno a muchos 
    public function sizes(){
        return $this->hasMany(size::class);
    }

    //relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, "imageable");
    }

      //url amigable
      public function getRouteKeyName(){
        return 'slug';
    }

    //relacion muchos a muchos 
  /*   public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    } */


  /*   public function ventas(){
        return $this->belongsToMany(Venta::class);
    }

    public function detalle(){
        return $this->hasMany(DetVentas::class);
    } */
}
