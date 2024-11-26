<?php

namespace App\Http\Controllers\Api\Admin\Activos;

use App\Exceptions\ProductNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Products\StoreProductRequest;
use Illuminate\Support\Facades\DB;
use App\Services\Api\Activos\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CnfProductsController extends Controller
{

    public $ProductService;

    public function __construct(ProductService $ProductService)
    {
        $this->middleware('role:admin');
        $this->ProductService = $ProductService;
    }

    public function index(Request $request): JsonResponse
    {
        $product = $this->ProductService->listProduct($request);
        return response()->json(["success" => true, "message" => "LISTA DE PRODUCTOS", "data" => $product], Controller::HTTP_SUCCESS);
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->ProductService->createProduct($request->validated());
        return response()->json(["success" => true, "message" => "PRODUCTO REGISTRADO", "data" => $product],  Controller::HTTP_SUCCESS);
    }

    public function show($slug): JsonResponse
    {

        $product = $this->ProductService->showProduct($slug);
        return response()->json(["success" => true, "message" => "PRODUCTO ENCONTRADO", "data" => $product],  Controller::HTTP_SUCCESS);
    }

    public function update($slug, StoreProductRequest $request): JsonResponse
    {
        $product = $this->ProductService->updateProduct($slug, $request->validated());
        return response()->json(["success" => true, "message" => "PRODUCTO ACTUALIZADO", "data" => $product],  Controller::HTTP_SUCCESS);
    }


    public function destroy($slug, StoreProductRequest $request)
    {
        $this->ProductService->deleteProduct($slug, $request->validated());

        return response()->json(["success" => true, "message" => "PRODUCTO ELIMINADO CON EXITO.",], Controller::HTTP_SUCCESS);
    }
}
