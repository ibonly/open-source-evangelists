<?php

/**
*
*/

namespace Ibonly\GithubStatusEvangelist;

use GuzzleHttp\Client;

class GithubConnectionEvangelist extends Client
{

    protected $username;
    protected $github_api;

    public function __construct($username)
    {
        $this->github_api = "https://api.github.com/users/{$username}/repos";
        parent::__construct([$this->url]);
    }
}