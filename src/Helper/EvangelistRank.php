<?php
/**
 * This package takes the GitHub username of an individual and rank based
 * on the number of public repositories the user has as:
 * Senior, Intermediate or Junior Evangelist.
 *
 * @package Ibonly\GithubStatusEvangelist\EvangelistRank
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Ibonly\GithubStatusEvangelist;
use Ibonly\GithubStatusEvangelist\EvangelistRankInterface;

class EvangelistRank implements EvangelistRankInterface
{

    protected $data;
    protected $zeroEvangelist;
    protected $junior;
    protected $associate;
    protected $senior;
    protected $output;

    /**
     * Define the arguments needed
     * @param NULL
     */

    public function __construct($data)
    {
        $this->data = $data;
        $this->senior = "Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place";
        $this->associate = "Keep Up The Good Work, I crown you Associate Evangelist";
        $this->junior = "Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist";
        $this->zeroEvangelist = "You need to have at least 5 public repostories to be rank";

    }

    /**
     * Get the value from the class instatiations
     *
     * @return Integer
     */

    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the value of getSeniorEvangelist()
     *
     * @return String
     */

    public function getSeniorEvangelist()
    {
        return $this->senior;
    }

    /**
     * Get the value of getAssociateEvangelist()
     *
     * @return String
     */

    public function getAssociateEvangelist()
    {
        return $this->associate;
    }

    /**
     *  Get the value of getJuniorEvangelist()
     * @return String
     */

    public function getJuniorEvangelist()
    {
        return $this->junior;
    }

    /**
     *  Get the value of getZeroEvangelist()
     * @return String
     */

    public function getZeroEvangelist()
    {
        return $this->zeroEvangelist;
    }

    /**
     * getRating()
     *
     * @return String
     */

    public function getRating()
    {
        switch ($this->getData()) {
            case $this->getData() < 5:                              #check if getData() is less than 5
                $output = $this->getZeroEvangelist();
                break;
            case $this->getData() >= 5 && $this->getData() <= 10:   #check if getData() is between 5 and 10
                $output = $this->getJuniorEvangelist();
                break;
            case $this->getData() >= 11 && $this->getData() <= 20:  #check if getData() is between 11 and 20
                $output = $this->getAssociateEvangelist();
                break;
            case $this->getData() >= 21:                            #check if getData() is more than 20
                $output = $this->getSeniorEvangelist();
        }
        return $output;
    }
}