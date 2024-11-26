<?php

namespace App\Exceptions;

use App\Http\Controllers\Controller;
use Exception;

class ProductNotFoundException extends Exception
{
    protected $message = 'El producto especificado no existe.';
    protected $code = Controller::HTTP_WARNING;

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }
}
