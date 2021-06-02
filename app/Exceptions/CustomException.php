<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    private $_options;

    public function __construct(
        $message,
        $code = 0,
        Exception $previous = null,
        $options = []
    ) {
        parent::__construct($message, $code, $previous);

        $this->_options = $options;
    }

    public function GetOptions()
    {
        return $this->_options;
    }
}