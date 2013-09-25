<?php
use KeywordDensity\Validator\Url\Protocol;

class ProtocolTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Protocol
     */
    protected $validator;

    public function setUp() {
        $this->validator = new Protocol();
    }

    public function testProtocolIsHttpOrHttps() {
        $this->assertTrue($this->validator->validate("http://www.somehostname.de"));
        $this->assertTrue($this->validator->validate("https://www.somehostname.de"));
        $this->assertFalse($this->validator->validate("www.somehostname.de"));
        $this->assertFalse($this->validator->validate("ftp://www.somehostname.de"));
    }
}