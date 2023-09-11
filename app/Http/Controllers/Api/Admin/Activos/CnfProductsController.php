<?php

namespace App\Http\Controllers\Api\Admin\Activos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Products\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Services\Api\Activos\ProductService;

class CnfProductsController extends Controller
{
    public function index(ProductService $productService){
        try {
            $product = $productService->listProduct();
            // $product = Product::all()->take(15);
            return response()->json(["success" => true, "message" => "LISTA DE PRODUCTOS", "data" => $product], Controller::HTTP_SUCCESS);
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
            return response()->json(["success" => true, "message" => "PRODUCTO REGISTRADO", "data" => $product],  Controller::HTTP_SUCCESS);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["success" => false, "message" => $e->getMessage(),$e->getCode()],Controller::HTTP_ERROR_SERVER);
        }
    }
    public function show($slug,ProductService $productService){
    
       
        try {
            $product = $productService->showProduct($slug);
            return response()->json(["success" => true, "message" => "PRODUCTO ENCONTRADO", "data" => $product],  Controller::HTTP_SUCCESS);
        } catch (\Throwable $th) {
   
            return response()->json(["success" => false, "message" => $th->getMessage(),$th->getCode()],Controller::HTTP_ERROR_SERVER);
        }
    }

    public function update($slug, StoreProductRequest $request, ProductService $productService){
        DB::beginTransaction();
        try {
            $product = $productService->updateProduct($slug,$request->validated());
            DB::commit();
            return response()->json(["success" => true, "message" => "PRODUCTO ACTUALIZADO", "data" => $product],  Controller::HTTP_SUCCESS);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(["success" => false, "message" => $e->getMessage(),$e->getCode()],Controller::HTTP_ERROR_SERVER);
        }
    }


    public function delete(){


    }
}
