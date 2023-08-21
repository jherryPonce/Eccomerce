<?php

namespace App\Http\Controllers\Api\Admin\CnfProductos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Products\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ProductService;

class CnfProductsController extends Controller
{
    public function index(){
        try {
            $product = Product::all()->take(15);
            return response()->json(["success" => true, "message" => "LISTA DE PRODUCTOS", "data" => $product], 200);
        } catch (\Exception $e) {
       
            return response()->json(["success" => false, "message" => $e->getMessage()]);
        }
    }

    public function store(StoreProductRequest $request, ProductService $productService)
    {
        DB::beginTransaction();
        try {
            $product = $productService->createProduct($request->validated());
            DB::commit();
            return response()->json(["success" => true, "message" => "PRODUCTO REGISTRADO", "data" => $product], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["success" => false, "message" => $e->getMessage()], $e->getCode());
        }
    }
}
