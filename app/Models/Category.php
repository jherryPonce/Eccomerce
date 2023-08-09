<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Category extends Model
{
    use HasFactory;

    protected $fillable =['name','slug','icon','image',];
    //relacion uno a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    //relacion muchos a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

   // relacion uno a muchos pero atravez de otra relacion(osea a travez de la tabla subcategories)
    public function products(){
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }

    //url amigable
    public function getRouteKeyName(){
        return 'slug';
    }
}
