<?php

use App\Http\Requests\Api\Products\StoreProductRequest;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ProductService
{
    public function createProduct(array $request): Product
    {
        // Verificar si el subcategory_id existe
        $subcategoryExists = Subcategory::where('id', $request['subcategory_id'])->exists();

        if (!$subcategoryExists) {
            throw new \Exception('La subcategoría especificada no existe.');
        }

        // Crear el producto
        $product = Product::create($request);
        
        return $product;
    }
}
