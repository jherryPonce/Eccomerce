<?php

namespace Database\Seeders;
//para realizar relaciones en subcategorias con respecto a true o false en color y size
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //wherehas permite hacer consultas a las relaciones del modelo 
        //se condiciona que nos retorne todos los productos que cumplan con lo pedido 
        $products=Product::whereHas('subcategory', function(Builder $query){
            $query->where('color',true)
            ->where('size',true);
        })->get();

        $sizes=[
            'Talla S','Talla M','Talla L'
        ];





        foreach ($products as $product) {
            # code...
            foreach ($sizes as $size) {
                # code...
                $product->sizes()->create([
                    'name'=>$size
                    ]);
            }
          
        }
    }
}
