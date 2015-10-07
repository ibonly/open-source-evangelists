<?php
/**
 * Run test on the UserStatusTest
 *
 * @package Ibonly\GithubStatusEvangelist\Test\UserStatusTest
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */

namespace Ibonly\GithubStatusEvangelist\Test;

use PHPUnit_Framework_TestCase;
use Ibonly\GithubStatusEvangelist\EvangelistStatus;

class UserStatusTest extends PHPUnit_Framework_TestCase
{
    /**
     * Define class initialization
     */
    public function setUp()
    {
        $this->evangelists = new EvangelistStatus('andela-iadeniyi');
    }

    /**
     * Test to check if Number of repositories return Integer
     */
    public function testgetRepoNumberOutputIsInteger()
    {
        $this->assertInternalType("int", $this->evangelists->getRepoNumber());
    }

    /**
     * Test to check if Name return string
     */
    public function testgetNameOutputIsInteger()
    {
        $this->assertInternalType("string", $this->evangelists->getName());
    }
    /**
     * Test to check if follower return Integer
     */
    public function testgetFollowersOutputIsInteger()
    {
        $this->assertInternalType("int", $this->evangelists->getFollowers());
    }

    /**
     * Test to check if Following return Integer
     */
    public function testgetFollowingOutputIsInteger()
    {
        $this->assertInternalType("int", $this->evangelists->getFollowing());
    }
}