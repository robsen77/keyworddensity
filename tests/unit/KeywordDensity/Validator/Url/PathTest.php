<?php
use KeywordDensity\Validator\Url\Path;
use KeywordDensity\Parser\Url;

class PathTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var KeywordDensity\Validator\Url\Path
     */
    private $validator;

    public function setUp()
    {
        $this->validator = new Path();
    }

    /**
     * @dataProvider validSignsDataProvider
     */
    public function testPathContainsOnlyValidSigns($url, $expected)
    {
        $urlParser = new Url();
        $urlParser->parse($url);

        $this->assertEquals($expected, $this->validator->validate($urlParser));
    }

    public function validSignsDataProvider()
    {
        return array(
            array("http://www.somehostname.de", true),
            array("http://somehostname.de", true),
            array("http://somehostname.de/?q=something", true),
            array("http://somehostname.de/with_longPath/with/in?q=something", true),
            array("http://somehostname.de/with_longPath/with/in/script.php", true),
            array("http://somehostname.de/with_longPath /with/in/script.php", false),
            array("http://somehostname.de/?q=something", true),
            array("http://somehostname.de/?q=something", true),
            array("http://some-host-name.de/?q=something", true),
            array("http://172.0.0.1/?q=something", true),
        );
    }
}