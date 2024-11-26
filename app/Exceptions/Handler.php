<?php

namespace App\Exceptions;

use App\Exceptions\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
       
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $e, $request) {
           
        });
    }


    public function render($request, Throwable $exception): JsonResponse
    {
        // Manejo de excepciones personalizadas
        if ($exception instanceof ProductNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }

        if ($exception instanceof SubcategoryNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], $exception->getCode());
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => 401
            ], $exception->getCode());
        }

        // Manejo de excepciones estándar
        if ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'success' => false,
                'message' => 'Recurso no encontrado.',
            ], 404);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación.',
                'errors' => $exception->errors(),
            ], 422);
        }

    if ($exception instanceof UnauthorizedException) {
            return response()->json([
                'success' => false,
                'message' => 'NO TIENE LOS PERMISOS NECESARIOS PARA ACCDER A ESTE RECURSO',
                'error_code' => 'UNAUTHORIZED_ROLE_OR_PERMISSION',
                'errors' => $exception->getMessage(),
            ], 401);
        } 
        // Excepción genérica para otros errores
        return response()->json([
            'success' => false,
            'message' => 'Error interno del servidor.',
            'error' => $exception->getMessage(),
        ], 500);
    }
}
