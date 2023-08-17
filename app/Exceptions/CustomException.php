<?php

namespace App\Exceptions;
use App\Interfaces\iException;
// use \Log;

class CustomException extends \Exception implements iException
{
    public function __construct($message = "Unknown exception", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return get_class($this) . " '{$this->message}' in {$this->file}({$this->line})\n"
            . "{$this->getTraceAsString()}";
    }
}