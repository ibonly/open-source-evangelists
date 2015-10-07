<?php
/**
 * This package takes the GitHub username of an individual and rank based
 * on the number of public repositories the user has as:
 * Senior, Intermediate or Junior Evangelist.
 *
 * @package Ibonly\GithubStatusEvangelist\EvangelistStatus
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
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
        $this->username = $username;
        $this->github_api = "https://api.github.com/users/{$this->username}?client_id=".$this->getEnvData();
        parent::__construct([$this->github_api]);
    }

    /**
     * Get the environment variables from .env using vlucas package
     *
     * @return String
     */
    public function getEnvData()
    {
        $dotenv = new Dotenv(__DIR__ ."../../");
        $dotenv->load();
        return getenv('ClientID')."&client_secret=".getenv('ClientSecret');
    }

    /**
     * Return the data recieved from the GITHUB API
     *
     * @return jsonArray
     */
    public function getAPIData()
    {
        $output = $this->get($this->github_api);
        return $output->json();
    }

    /**
     * Get the name from the return data getAPIData
     *
     * @return string
     */
    public function getName()
    {
        $githubData = $this->getAPIData();
        return $githubData['name'];
    }

    /**
     * Get the number of followers from the return data getAPIData
     *
     * @return Integer
     */
    public function getFollowers()
    {
        $githubData = $this->getAPIData();
        return $githubData['followers'];
    }

    /**
     * Get the number of users following from the return data getAPIData
     *
     * @return Integer
     */
    public function getFollowing()
    {
        $githubData = $this->getAPIData();
        return $githubData['following'];
    }

    /**
     * Get the number of repositories from the return data getAPIData
     *
     * @return Integer
     */
    public function getRepoNumber()
    {
        $githubData = $this->getAPIData();
        $userRepo = $githubData['public_repos'];
        return $userRepo;
    }

    /**
     * Get the rank message from EvangelistRank
     *
     * @return String
     */
    public function getRank()
    {
        $rank = new EvangelistRank($this->getRepoNumber());
        return $rank->getRating();
    }

    /**
     * Get the output
     *
     * @return String
     */
    public function getStatus()
    {
        try {
            $output = "Hello ".$this->getName();
            $output .= "<br />".$this->getRank();
            $output .= "<br />You have ". $this->getRepoNumber() ." Github Repositoris";
            $output .= "<br />You have ". $this->getFollowers() ." Followers";
            $output .= " and Following ". $this->getFollowing() ." Github Users";
            return $output;
        } catch ( InvalidUserException $e ) {
            return "Invalid user";
        }
    }

}