<?php
/**
 * Defining Interface for class EvangelistRank.
 *
 * @package Ibonly\GithubStatusEvangelist\EvangelistRankInterface
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

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