<?php

/**
*
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

    public function __construct($data)
    {
        $this->data = $data;
        $this->senior = "Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place";
        $this->associate = "Keep Up The Good Work, I crown you Associate Evangelist";
        $this->junior = "Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist";
        $this->zeroEvangelist = "You need to have at least 5 public repostories to be rank";

    }

    public function getData()
    {
        return $this->data;
    }
    public function getSeniorEvangelist()
    {
        return $this->senior;
    }
    public function getAssociateEvangelist()
    {
        return $this->associate;
    }
    public function getJuniorEvangelist()
    {
        return $this->junior;
    }
    public function getZeroEvangelist()
    {
        return $this->zeroEvangelist;
    }
    public function getZeroEvangelt()
    {
        return $this->zeroEvangelist;
    }

    public function getRating()
    {
        switch ($this->getData()) {
            case $this->getData() < 5:
                $output = $this->getZeroEvangelist();
                break;
            case $this->getData() >= 5 && $this->getData() <= 10:
                $output = $this->getJuniorEvangelist();
                break;
            case $this->getData() >= 11 && $this->getData() <= 20:
                $output = $this->getAssociateEvangelist();
                break;
            case $this->getData() >= 21:
                $output = $this->getSeniorEvangelist();
        }
        return $output;
    }
}