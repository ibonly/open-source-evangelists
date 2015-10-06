<?php
/**
 * Exception for empty user input
 *
 * @package Ibonly\GithubStatusEvangelist\NullUserException
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Ibonly\GithubStatusEvangelist;

use Exception;

class NullUserException extends Exception
{

    protected $exception_message;

    public function __construct()
    {
        $this->exception_message = "Username is empty";
    }

    /**
     * Handle empty user
     *
     * @return string
     */
    public function errorMessage()
    {
        return "Error: " . $this->exception_message;
    }
}