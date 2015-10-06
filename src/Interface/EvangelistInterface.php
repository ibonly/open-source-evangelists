<?php
/**
 * Defining Interface for class EvangelistStatus.
 *
 * @package Ibonly\GithubStatusEvangelist\EvangelistInterface
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

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