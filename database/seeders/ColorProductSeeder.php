<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//para realizar relaciones en subcategorias con respecto a true o false en color y size
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //wherehas permite hacer consultas a las relaciones del modelo 
        //se condiciona que nos retorne todos los productos que cumplan con lo pedido 
        $products = Product::whereHas('subcategory', function(Builder $query){
            $query->where('color', true)
                    ->where('size', false);
        })->get();
//usando el metodo attach agrega datos a la tabla intermedia de las dos tablas con relaccion muchos a muchos

foreach ($products as $product) {
    $product->colors()->attach([
        1 => [
            'quantity' => 10
        ], 
        2 => [
            'quantity' => 10
        ], 
        3 => [
            'quantity' => 10
        ], 
        4 => [
            'quantity' => 10
        ]
    ]);
}
    }
}
