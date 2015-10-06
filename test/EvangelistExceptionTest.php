<?php
/**
 * Run test on the EvangelistRank class for both guzzlehhtp and NullUserException
 *
 * @package Ibonly\GithubStatusEvangelist\Test\EvangelistExceptionTest
 * @author  Ibraheem ADENIYI <ibonly01@gmail.com>
 * @license MIT <https://opensource.org/licenses/MIT>
 */


namespace Ibonly\GithubStatusEvangelist\Test;

use PHPUnit_Framework_TestCase;
use Ibonly\GithubStatusEvangelist\EvangelistStatus;
use Exception;

class EvangelistExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test exception if empty string or nothing is passed as argument
     *
     * @return NULL
     */
    public function sampleInput() {
        return [['']];
    }

    /**
     * @dataProvider sampleInput
     *
     * @expectedException Exception
     */
    public function testNullInputException($username) {
        $evangelists = new EvangelistStatus($username);
    }

    /**
     * Test if Github username does not exist
     */
    public function testInvalidUserException() {
        $evangelists = new EvangelistStatus('skfmfsdkds');
        $this->assertEquals("Invalid user", $evangelists->getStatus());
    }
}