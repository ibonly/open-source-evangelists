<?php

/**
*
*/

namespace Ibonly\GithubStatusEvangelist;
use Exception;

class NullUserException extends Exception
{

    protected $exception_message;

    public function __construct() {
        $this->exception_message = "Username is empty";
    }

    public function errorMessage()
    {
        return "Error: " . $this->exception_message;
    }
}