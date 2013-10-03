<?php
use Robsen77\KeywordDensity\Validator\Url\Protocol;
use Robsen77\KeywordDensity\Parser\Url;

class ProtocolTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Protocol
     */
    protected $validator;

    public function setUp()
    {
        $this->validator = new Protocol();
    }

    /**
     * @dataProvider urlDataProvider
     */
    public function testProtocolIsHttpOrHttps($url, $expected)
    {
        $urlParser = new Url();
        $urlParser->parse($url);

        $this->assertEquals($expected, $this->validator->validate($urlParser));
    }

    public function urlDataProvider()
    {
        return array(
            array("http://www.somehostname.de", true),
            array("http://somehostname.de", true),
            array("https://somehostname.de/?q=something", true),
            array("https://some-host-name.de/?q=something", true),
            array("sftp://some-host-name.de/?q=something", false),
            array("http://172.0.0.1/?q=something", true),
            array("ftp://172.0.0.1/?q=something", false),
        );
    }
}