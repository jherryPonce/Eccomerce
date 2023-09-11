<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    CONST HTTP_NOT_ACCEPTABLE                                   = 406;
    CONST HTTP_NOT_FOUND                                        = 404;
    CONST HTTP_WARNING                                          = 422;
    CONST HTTP_SUCCESS                                          = 200;
    CONST HTTP_ERROR_SERVER                                     = 500;

}
