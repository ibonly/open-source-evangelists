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
        $this->assertEquals("integer", gettype($this->evangelists->getData()));
    }
}