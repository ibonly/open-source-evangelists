<?php

/**
*
*/

namespace Ibonly\GithubStatusEvangelist;
use GuzzleHttp\Exception\BadResponseException as GuzzleException;

class InvalidUserException extends GuzzleException
{

    protected $exception_message;

    public function __construct() {
        $this->exception_message = "Invalid Github username, Please enter a valid github Username";
    }

    public function errorMessage()
    {
        return "Error: " . $this->exception_message;
    }

}