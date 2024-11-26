<?php

namespace App\Exceptions;

use App\Http\Controllers\Controller;
use Exception;

class SubcategoryNotFoundException extends Exception
{
    protected $message;
    protected $code;

    public function __construct($message = "Subcategoria no encontrado", $code =Controller::HTTP_WARNING)
    {
        $this->message = $message;
        $this->code = $code;
        parent::__construct($message, $code);
    }
}
