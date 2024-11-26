<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //nombre generado automaticamente 
        $name= $this->faker->sentence(2);
        //se obtiene las sub categorias de manera aleatoria con randon
        $subcategory = Subcategory::all()->random();
        //se obtiene la categoria de las sub categoria obtenido anteriormente
        $category = $subcategory->category;
        //se obtiene las marcas de la categoria obtenido anteriroimente , y esta es de manera aleatoria
        $brand= $category->brands->random();
        //se condiciona para saber si el producto a regiustarr necesita que la cantidad vala en la tabla colo_product o a product
        if($subcategory->color){
            $quantity=null;

        }
        else{
            $quantity=15;
        }

        return [
            'name'=>$name,
            'slug'=> Str::slug($name),
            'description'=>$this->faker->text(),
            'price'=>$this->faker->randomElement([11.99,17.99,26.99]),
            'subcategory_id'=> $subcategory->id,
            'brand_id' =>  $brand->id,
            'quantity'=>$quantity,
            'status'=>2,
            'SKU'=>'id'.$quantity,

          
        ];
    }
}
