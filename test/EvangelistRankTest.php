<?php

/**
*
*/

namespace Ibonly\GithubStatusEvangelist\Test;

use PHPUnit_Framework_TestCase;
use Ibonly\GithubStatusEvangelist\EvangelistRank;

class EvangelistRankTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->evangelists = new EvangelistRank(12);
    }

    public function testgetFollowingOutputIsInteger()
    {
        $this->assertEquals("integer", gettype($this->evangelists->getData()));
    }
}