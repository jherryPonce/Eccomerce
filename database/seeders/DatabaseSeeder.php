<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //crea la carpeta para almacenar las imagenes
         Storage::deleteDirectory('categories');
         Storage::deleteDirectory('subcategoria');
         Storage::deleteDirectory('producto');
        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategoria');
        Storage::makeDirectory('producto');
        //databaseseeder es el que se ejecuta
         //en realidad asi que es necesario que este haga el llamado a los de mas seeder pra que se puedan compilar

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);

        $this->call(SizeSeeder::class);
        $this->call(ColorSizeSeeder::class);


    }
}
