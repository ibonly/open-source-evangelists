<?php
/**
 * Run test on the EvangelistRank
 *
 * @package Ibonly\GithubStatusEvangelist\Test\EvangelistRankTest
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Ibonly\GithubStatusEvangelist\Test;

use PHPUnit_Framework_TestCase;
use Ibonly\GithubStatusEvangelist\EvangelistRank;
use Ibonly\GithubStatusEvangelist\EvangelistStatus;

class EvangelistRankTest extends PHPUnit_Framework_TestCase
{
    /**
     * Define class initialization
     */
    public function setUp()
    {
        $this->evangelists = new EvangelistRank(12);
    }

    /**
     * Test check if public_repos return an Integer
     */
    public function testgetFollowingOutputIsInteger()
    {
        $this->assertInternalType("int", $this->evangelists->getData());
    }

    /**
     * Test check if getSeniorEvangelist return 21 or more
     */
    public function testgetSeniorEvangelistReturn21OrMore()
    {
        $evangelists = new EvangelistStatus('busayo');
        $this->assertGreaterThanOrEqual(21, $evangelists->getRepoNumber());
    }

    /**
     * Test check if getSeniorEvangelist return 15 or more
     */
    public function testgetAssociateEvangelistReturn11OrMore()
    {
        $evangelists = new EvangelistStatus('andela-eosuagwu');
        $this->assertGreaterThanOrEqual(11, $evangelists->getRepoNumber());
        $this->assertLessThanOrEqual(20, $evangelists->getRepoNumber());
    }

    /**
     * Test check if getSeniorEvangelist return 5 or more
     */
    public function testgetJuniorEvangelistReturn5OrMore()
    {
        $evangelists = new EvangelistStatus('andela-iadeniyi');
        $this->assertGreaterThanOrEqual(5, $evangelists->getRepoNumber());
        $this->assertLessThanOrEqual(10, $evangelists->getRepoNumber());
    }
    /**
     * Test check if getSeniorEvangelist return 5 or more
     */
    public function testgetZeroEvangelistReturn5OrMore()
    {
        $evangelists = new EvangelistStatus('ekun');
        $this->assertLessThanOrEqual(5, $evangelists->getRepoNumber());
    }
}