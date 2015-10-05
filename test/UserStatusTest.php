<?php

/**
*
*/

namespace Ibonly\GithubStatusEvangelist\Test;

use PHPUnit_Framework_TestCase;
use Ibonly\GithubStatusEvangelist\EvangelistStatus;

class UserStatusTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->evangelists = new EvangelistStatus('andela-iadeniyi');
    }

    public function testgetRepoNumberOutputIsInteger()
    {
        $this->assertEquals("integer", gettype($this->evangelists->getRepoNumber()));
    }

    public function testgetNameOutputIsInteger()
    {
        $this->assertEquals("string", gettype($this->evangelists->getName()));
    }

    public function testgetFollowersOutputIsInteger()
    {
        $this->assertEquals("integer", gettype($this->evangelists->getFollowers()));
    }

    public function testgetFollowingOutputIsInteger()
    {
        $this->assertEquals("integer", gettype($this->evangelists->getFollowing()));
    }
}