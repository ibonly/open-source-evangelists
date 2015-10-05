<?php

namespace Ibonly\GithubStatusEvangelist;

interface EvangelistRankInterface
{

    public function getData();

    public function getSeniorEvangelist();

    public function getAssociateEvangelist();

    public function getJuniorEvangelist();

    public function getZeroEvangelist();

    public function getRating();

}