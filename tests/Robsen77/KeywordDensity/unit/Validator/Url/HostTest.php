<?php
use Robsen77\KeywordDensity\Validator\Url\Host;

class HostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Host
     */
    protected $validator;

    public function setUp()
    {
        $this->validator = new Host();
    }

    /**
     * @dataProvider urlDataProvider
     */
    public function testSeveralHostnames($url, $expected)
    {
        $urlParser = new \Robsen77\KeywordDensity\Parser\Url();
        $urlParser->parse($url);

        $this->assertEquals($expected, $this->validator->validate($urlParser));
    }

    public function urlDataProvider()
    {
        return array(
            array("http://www.somehostname.de", true),
            array("http://somehostname.de", true),
            array("http://somehostname.de/?q=something", true),
            array("http://some-host-name.de/?q=something", true),
            array("http://some_host_name.de/?q=something", false),
            array("http://172.0.0.1/?q=something", true),
            array("http://256.0.0.1/?q=something", false),
            array("http://172.0.0.256/?q=something", false),
        );
    }
}