<?php
/**
*
*/

namespace Ibonly\GithubStatusEvangelist;

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException as InvalidUserException;
use Ibonly\GithubStatusEvangelist\EvangelistRank;
use Ibonly\GithubStatusEvangelist\NullUserException;
use Ibonly\GithubStatusEvangelist\EvangelistInterface;

class EvangelistStatus extends Client implements EvangelistInterface
{

    protected $username;
    protected $github_api;

    public function __construct($username)
    {
            if(empty($username)) {
                throw new NullUserException();
            }
            $dotenv = new Dotenv(__DIR__ ."../../");
            $dotenv->load();
            $this->username = $username;
            $this->github_api = "https://api.github.com/users/{$this->username}?client_id=".getenv('ClientID')."&client_secret=".getenv('ClientSecret');
            parent::__construct([$this->github_api]);
    }

    public function getAPIData()
    {
        $output = $this->get($this->github_api);
        return $output->json();
    }

    public function getName()
    {
        $global_value = $this->getAPIData();
        return $global_value['name'];
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

    public function getRepoNumber()
    {
        $global_value = $this->getAPIData();
        $userRepo = $global_value['public_repos'];
        return $userRepo;
    }

    public function getRank()
    {
        $rank = new EvangelistRank($this->getRepoNumber());
        return $rank->getRating();
    }

    // public function invalidUser()
    // {
    //     $global_value = $this->getAPIData();
    //     if( isset ($global_value['message']))
    //     {
    //         throw new InvalidUserException("User does not");
    //     }
    //}

    public function getStatus()
    {
        try{
        $output = "Hello ".$this->getName();
        $output .= "<br />".$this->getRank();
        $output .= "<br />You have ". $this->getRepoNumber() ." Github Repositoris";
        $output .= "<br />You have ". $this->getFollowers() ." Followers";
        $output .= " and Following ". $this->getFollowing() ." Github Users";
        return $output;
        }catch(InvalidUserException $e){
            return "Invalid user";
        }
    }

}