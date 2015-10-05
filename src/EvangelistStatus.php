<?php
/**
*
*/

namespace Ibonly\GithubStatusEvangelist;

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use Ibonly\GithubStatusEvangelist\EvangelistRank;
use Ibonly\GithubStatusEvangelist\EvangelistInterface;
use Ibonly\GithubStatusEvangelist\InvalidUserException;
use GuzzleHttp\Exception\BadResponseException as GuzzleException;

class EvangelistStatus extends Client implements EvangelistInterface
{

    protected $username;
    protected $github_api;

    public function __construct($username)
    {
        $dotenv = new Dotenv(__DIR__ ."../../");
        $dotenv->load();
        $this->username = $username;
        $this->github_api = "https://api.github.com/users/{$this->username}?client_id=".getenv('ClientID')."&client_secret=".getenv('ClientSecret');
        parent::__construct([$this->github_api]);
    }

    public function getAPIData()
    {
        try
        {
            $a = $this->get($this->github_api);
            return $a->json();
        }
        catch(GuzzleException $e)
        {
            return "Github username does not exist";
        }
    }

    public function getName()
    {
        $global_value = $this->getAPIData();
        return $global_value['name'];
    }

    public function getRepoNumber()
    {
        $global_value = $this->getAPIData();
        $userRepo = $global_value['public_repos'];
        return $userRepo;
    }

    public function getFollowers()
    {
        $global_value = $this->getAPIData();
        return $global_value['followers'];
    }

    public function getFollowing()
    {
        $global_value = $this->getAPIData();
        return $global_value['following'];
    }

    public function getRank()
    {
        $rank = new EvangelistRank($this->getRepoNumber());
        return $rank->getRating();
    }

}