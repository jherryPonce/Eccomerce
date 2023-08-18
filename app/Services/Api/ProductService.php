<?php

use App\Models\Product;
use Illuminate\Support\Facades\Request;

class ProductService
{
    public function createProduct(Request $request):Product
    {
        $product = Product::create([

        ]);
    }
}