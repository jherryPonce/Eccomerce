<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;
/*     al no ir con la nomenclatura definiremos a que tabla hace referencia */
    protected $table = "color_product";

    /* Relacion uno a muchos inversa */
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
