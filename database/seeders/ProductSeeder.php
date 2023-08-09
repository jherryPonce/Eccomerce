<?php

namespace Database\Seeders;

use App\Models\Almacen;
use App\Models\Image;
use App\Models\Kardex;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Stock;
use App\Models\TipoMovimiento;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $tipomovimiento = [

            [              
                'descripcion' => 'Devolucion',               
             /*    'estado' => 'aprobado' */
            ],


            [
                'descripcion' => 'venta1',
            /*     'estado' => 'aprobado' */
            ],


            [
                'descripcion' => 'venta2',
        /*         'estado' => 'aprobado' */

            ],

        ];
        foreach ($tipomovimiento as $tipomovimientos) {
            TipoMovimiento::create($tipomovimientos);
            
        }



        $Almacen = [

            [              
                'descripcion' => 'rojo',               
             /*    'estado' => 'aprobado' */
            ],


            [
                'descripcion' => 'azul',
            /*     'estado' => 'aprobado' */
            ],


            [
                'descripcion' => 'verde',
        /*         'estado' => 'aprobado' */

            ],

        ];
        foreach ($Almacen as $Almacenes) {
            Stock::create($Almacenes);
            
        }
        
        //each es como si estuviera dentro del for, recorrera los productos creados y
        //descargara 4 imagenes por producto.
        //each(function(Product $product) permite que se trabaje con el modelo product
        // Image::factory(4)->create manda que sean 4 imagenes por producto y asigana los otros valores
        Product::factory(250)->create()->each(function(Product $product ){
            Kardex::create([
                'Documento'=>$product->name,
                'Entrada'=>$product->quantity,
                'Salida'=>$product->quantity,
                'PrecioC'=>$product->priceC,
                'Preciov'=>$product->priceV,
                'InventarioIni'=>$product->quantity,
                'InventarioFinal'=>$product->quantity,
                'idProduct'=>$product->id,
                
                /* 'idAlmacen'=>'1',
                'idMovimiento'=>'2' */
            ]);
            Image::factory(4)->create([

                'Imageable_id'=>$product->id,
                'imageable_type'=>Product::class
            ]);

        });
    }
}
