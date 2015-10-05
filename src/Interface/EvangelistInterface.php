<?php

namespace Ibonly\GithubStatusEvangelist;

interface EvangelistInterface
{
    public function getAPIData();

    public function getName();

    public function getRepoNumber();

    public function getStatus();

    public function getFollowers();

    public function getFollowing();

    public function getRank();

}