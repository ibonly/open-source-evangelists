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

class EvangelistExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test exception if empty string or nothing is passed as argument
     *
     * @return NULL
     */
    public function sampleInput()
    {
        return [['']];
    }

    /**
     * @dataProvider sampleInput
     */
    public function testNullUserException($username)
    {
        $this->setExpectedException('\Ibonly\GithubStatusEvangelist\NullUserException');
        $evangelists = new EvangelistStatus($username);
    }

    /**
     * Test if Github username does not exist GuzzleHttp\Exception\RequestException
     */
    public function testInvalidUserExceptionMessage()
    {
        $evangelists = new EvangelistStatus('skfmfsdkds');
        $this->assertEquals("Invalid user", $evangelists->getStatus());
    }
}