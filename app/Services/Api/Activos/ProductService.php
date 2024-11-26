<?php

namespace App\Services\Api\Activos;

use App\Exceptions\ProductNotFoundException;
use App\Exceptions\SubcategoryNotFoundException;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ProductService
{
    public function listProduct($request): LengthAwarePaginator
    {
        $products = Product::query();

        // Filtro por nombre
        $products->when($request->name, function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name . '%');
        });

        // Ordenamiento
        $products->when($request->sort, function ($query) use ($request) {
            $type = request('type') ? request('type')  :  1;
            $type =  $type == 1 ? 'desc' : 'asc';
            $query->orderBy($request->sort, $type);
        });

        // Paginación
        $products = $products->paginate(request('per_page') ?? 20);

        return $products;
    }

    public function createProduct(array $request): Product
    {
            return Product::create($request);
    }

    public function showProduct(string $slug): Product
    {
        $product = Product::where('slug',  $slug)->with('Subcategory')->first();

        if (!$product) throw new ProductNotFoundException('El Producto especificado no existe.');

        //devuelve una instancia de la clase  product
        return $product;
    }

    public function updateProduct($slug, array $request): Product
    {
        // Verificar si el subcategory_id existe
        $subcategoryExists = $this->validateSubcategory($request['subcategory_id']);

        //Busco el producto
        $product = $this->showProduct($slug);

        //actualizo
        $product->update($request);

        return $product;
    }

    public function deleteProduct($slug, array $request): Product
    {
        // Verificar si el subcategory_id existe
        $subcategoryExists = $this->validateSubcategory($request['subcategory_id']);

        //Busco el producto
        $product = $this->showProduct($slug);

        //actualizo
        $product->update($request);

        return $product;
    }


    //validamos la subactegoria 
    private function validateSubcategory(int $subcategoryId): void
    {
        if (!Subcategory::where('id', $subcategoryId)->exists()) {
            throw new SubcategoryNotFoundException("La subcategoría especificada no existe.");
        }
    }
}
