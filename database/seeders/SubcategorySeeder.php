<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //



        $subcategories = [
            //celularesy tablets
             [
                'category_id' => 1,
                'name' => 'Celulares y Smartphones',
                'slug' => Str::slug('Celulares y Smartphones'),
                'color' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),

            ],

            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),

            ],

            //tv y audio


            [
                'category_id' => 2,
                'name' => 'Tv y audio',
                'slug' => Str::slug('Tv y audio'),

            ],

            [
                'category_id' => 2,
                'name' => 'Audios',
                'slug' => Str::slug('Audios'),

            ],

            [
                'category_id' => 2,
                'name' => 'Audio para autos',
                'slug' => Str::slug('Audios para autos'),

            ],

            //consola y videojuegos

            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),

            ],



            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station'),

            ],


            [
                'category_id' => 3,
                'name' => 'Videojuegos para PC',
                'slug' => Str::slug('Videojuegos para PC'),

            ],


            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),

            ],

            //computacion

            [
                'category_id' => 4,
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),

            ],

            [
                'category_id' => 4,
                'name' => 'Pc escritorio',
                'slug' => Str::slug('Pc escritorio'),

            ],

            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),

            ],

            [
                'category_id' => 4,
                'name' => 'Accesorio de Computadoras',
                'slug' => Str::slug('Accesorio de Computadoras'),

            ],

            //moda
            [
                'category_id' => 5,
                'name' => 'Bikinis',
                'slug' => Str::slug('Bikinis'),
                'color' => true,
                'size'=> true,
            ],

            [
                'category_id' => 5,
                'name' => 'Chompas',
                'slug' => Str::slug('Chompas'),
                'color' => true,
                'size'=> true,
            ],

            [
                'category_id' => 5,
                'name' => 'Accesorios',
                'slug' => Str::slug('Accesorios'),

            ],

            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Chompas'),
                'color' => true,
            ],
        ];
        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
            
        }
    }
}
