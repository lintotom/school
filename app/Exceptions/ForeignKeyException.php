<?php

namespace App\Exceptions;

use Throwable;
use Exception;
class ForeignKeyException extends Exception
{
    public function __construct($msg = 0, $code = 0) {
        parent::__construct($msg, $code);
    }

    
}
