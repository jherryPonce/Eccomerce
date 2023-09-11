<?php

namespace App\Services\Api\Activos;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class ProductService
{
    public function listProduct() : Collection 
    {
        $products = Product::all();

        return $products;
    }

    public function createProduct(array $request): Product
    {
        // Verificar si el subcategory_id existe
        $subcategoryExists = Subcategory::where('id', $request['subcategory_id'])->exists();

        if (!$subcategoryExists) throw new \Exception('La subcategoría especificada no existe.');

        // Crear el producto
        $product = Product::create($request);

        return $product;
    }

    public function showProduct(string $slug): Product
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) throw new \Exception('El Producto especificado no existe.');

        //devuelve una instancia de la clase  product
        return $product;
    }

    public function updateProduct($slug, array $request): Product
    {
        // Verificar si el subcategory_id existe
        $subcategoryExists = Subcategory::where('id', $request['subcategory_id'])->exists();

        if (!$subcategoryExists) throw new \Exception('La subcategoría especificada no existe.');
        
        //Busco el producto
        $product = $this->showProduct($slug);

        //actualizo
        $product->update($request);

        return $product;
    }
}
