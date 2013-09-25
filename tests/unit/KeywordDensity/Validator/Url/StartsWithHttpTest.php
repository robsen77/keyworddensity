<?php
use KeywordDensity\Validator\Url\StartsWithHttp;

class StartsWithHttpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StartsWithHttp
     */
    protected $validator;

    public function setUp() {
        $this->validator = new StartsWithHttp();
    }

    public function testUrlStartsWithHttp() {
        $this->assertFalse($this->validator->validate("www.google.de"));
        $this->assertTrue($this->validator->validate("http://www.google.de"));
        $this->assertTrue($this->validator->validate("https://www.google.de"));
    }
}