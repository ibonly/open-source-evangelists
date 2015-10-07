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

    /**
     * Define the arguments needed
     * @param data
     * @param senior
     * @param associate
     * @param junior
     * @param zeroEvangelist
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
     * Get the value from the class instatiation
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
        $output = "";
        switch ($this->getData()) {
            //if getData is less than 5
            case $this->getData() < 5:
                $output = $this->getZeroEvangelist();
                break;
            //if getData is between 5 and 10
            case $this->getData() >= 5 && $this->getData() <= 10:
                $output = $this->getJuniorEvangelist();
                break;
            //if getData is between 11 and 20
            case $this->getData() >= 11 && $this->getData() <= 20:
                $output = $this->getAssociateEvangelist();
                break;
            //if getData is greater than 21
            case $this->getData() >= 21:
                $output = $this->getSeniorEvangelist();
        }
        return $output;
    }
}