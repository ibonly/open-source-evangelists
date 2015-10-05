<?php

namespace Ibonly\GithubStatusEvangelist;

interface EvangelistInterface
{
    public function getAPIData();

    public function getName();

    public function getStatus();

    public function getFollowers();

    public function getFollowing();

}