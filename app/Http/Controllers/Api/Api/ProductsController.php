<?php

namespace App\Http\Controllers\Api\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\Activos\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public $ProductService;

    public function __construct(ProductService $ProductService)
    {
        $this->ProductService = $ProductService;
    }

    public function index(Request $request): JsonResponse
    {
    
            $product = $this->ProductService->listProduct($request);
            return response()->json(["success" => true, "message" => "LISTA DE PRODUCTOS", "data" => $product], Controller::HTTP_SUCCESS);
        
    }

    public function show($slug): JsonResponse
    {

        $product = $this->ProductService->showProduct($slug);
        return response()->json(["success" => true, "message" => "PRODUCTO ENCONTRADO", "data" => $product],  Controller::HTTP_SUCCESS);
    }
}
