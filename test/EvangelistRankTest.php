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
    public function testGetFollowingOutputIsInteger()
    {
        $this->assertInternalType("int", $this->evangelists->getData());
    }

    /**
     * Test check if getRepoNumber return 21 or more
     */
    public function testGetSeniorEvangelistReturn21OrMore()
    {
        $evangelists = new EvangelistStatus('busayo');
        $this->assertGreaterThanOrEqual(21, $evangelists->getRepoNumber());
    }

    /**
     * Test check if getSeniorEvangelist return specified text
     */
    public function testGetSeniorEvangelist()
    {
        $evangelists = new EvangelistRank(21);
        $testString = "Yeah, I crown you Most Senior Evangelist. Thanks for making the world a better place";
        $this->assertEquals($testString, $evangelists->getSeniorEvangelist());
    }

    /**
     * Test check if getRepoNumber return 15 or more
     */
    public function testGetAssociateEvangelistReturn11OrMore()
    {
        $evangelists = new EvangelistStatus('andela-eosuagwu');
        $this->assertGreaterThanOrEqual(11, $evangelists->getRepoNumber());
        $this->assertLessThanOrEqual(20, $evangelists->getRepoNumber());
    }

    /**
     * Test check if getAssociateEvangelist return specified text
     */
    public function testGetAssociateEvangelist()
    {
        $evangelists = new EvangelistRank(11);
        $testString = "Keep Up The Good Work, I crown you Associate Evangelist";
        $this->assertEquals($testString, $evangelists->getAssociateEvangelist());
    }

    /**
     * Test check if getRepoNumber return 5 or more
     */
    public function testGetJuniorEvangelistReturn5OrMore()
    {
        $evangelists = new EvangelistStatus('andela-iadeniyi');
        $this->assertGreaterThanOrEqual(5, $evangelists->getRepoNumber());
        $this->assertLessThanOrEqual(10, $evangelists->getRepoNumber());
    }

    /**
     * Test check if getJuniorEvangelist return specified text
     */
    public function testGetJuniorEvangelist()
    {
        $evangelists = new EvangelistRank(5);
        $testString = "Damn It!!! Please make the world better, Oh Ye Prodigal Evangelist";
        $this->assertEquals($testString, $evangelists->getJuniorEvangelist());
    }

    /**
     * Test check if getRepoNumber return 5 or more
     */
    public function testGetZeroEvangelistReturn5OrMore()
    {
        $evangelists = new EvangelistStatus('ekun');
        $this->assertLessThanOrEqual(5, $evangelists->getRepoNumber());
    }

    /**
     * Test check if getZeroEvangelist return specified text
     */
    public function testGetzeroEvangelist()
    {
        $evangelists = new EvangelistRank(2);
        $testString = "You need to have at least 5 public repostories to be rank";
        $this->assertEquals($testString, $evangelists->getZeroEvangelist());
    }
}