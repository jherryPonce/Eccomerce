<?php

namespace App\Exceptions;

use App\Http\Controllers\Controller;
use Exception;

class AuthenticationException extends Exception
{
    
    protected $message = 'USUARIO NO AUTENTICADO';
    protected $code = Controller::HTTP_UNAUTHENTICATED;

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }
}


class TokenMissingException extends Exception
{
    protected $message = 'No se ha proporcionado un token de acceso';
    protected $code = 401;

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }
}


class InvalidTokenException extends Exception
{
    protected $message = 'El token proporcionado no es válido o ha expirado';
    protected $code = 401;

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }
}


class UnauthorizedRoleException extends Exception
{
    protected $message = 'No tienes el rol necesario para acceder a este recurso';
    protected $code = 403;

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }
}


class UnauthorizedPermissionException extends Exception
{
    protected $message = 'No tienes los permisos necesarios para realizar esta acción';
    protected $code = 403;

    public function __construct(string $message = null, int $code = null)
    {
        parent::__construct($message ?? $this->message, $code ?? $this->code);
    }
}