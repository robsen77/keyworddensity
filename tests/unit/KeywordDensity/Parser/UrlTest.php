<?php
use KeywordDensity\Parser\Url;

class UrlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider schemeDataProvider
     */
    public function testParsedScheme($url, $expectedScheme) {
        $urlParser = new Url();
        $urlParser->parse($url);

        $this->assertEquals($expectedScheme, $urlParser->getScheme());
    }

    public function schemeDataProvider() {
        return array(
            array("http://www.somehost.de", "http"),
            array("https://www.somehost.de", "https"),
            array("ftp://somehost.de", "ftp"),
            array("sftp://somehost.de", "sftp"),
            array("://somehost.de", ""),
        );
    }

    /**
     * @dataProvider hostDataProvider
     */
    public function testParsedHost($url, $expectedHost) {
        $urlParser = new Url();
        $urlParser->parse($url);

        $this->assertEquals($expectedHost, $urlParser->getHost());
    }

    public function hostDataProvider() {
        return array(
            array("http://www.somehost1.de", "www.somehost1.de"),
            array("https://www.somehost2.de", "www.somehost2.de"),
            array("ftp://somehost3.de", "somehost3.de"),
            array("sftp://somehost4.de", "somehost4.de"),
            array("sftp://sub.domain.somehost5.de", "sub.domain.somehost5.de"),
            array("://somehost6.de", ""),
        );
    }

    /**
     * @dataProvider portDataProvider
     */
    public function testParsedPort($url, $expectedPort) {
        $urlParser = new Url();
        $urlParser->parse($url);

        $this->assertEquals($expectedPort, $urlParser->getPort());
    }

    public function portDataProvider() {
        return array(
            array("http://www.somehost1.de", ""),
            array("http://www.somehost1.de:80", 80),
            array("https://www.somehost2.de", ""),
            array("https://www.somehost2.de:443", 443),
            array("ftp://somehost3.de", ""),
            array("ftp://somehost3.de:23", 23),
            array("sftp://somehost4.de", ""),
            array("sftp://sub.domain.somehost5.de", ""),
            array("://somehost6.de", ""),
        );
    }
    /**
     * @dataProvider pathDataProvider
     */
    public function testParsedPath($url, $expectedPath) {
        $urlParser = new Url();
        $urlParser->parse($url);

        $this->assertEquals($expectedPath, $urlParser->getPath());
    }

    public function pathDataProvider() {
        return array(
            array("http://www.somehost.de", ""),
            array("http://www.somehost.de/", "/"),
            array("http://www.somehost.de/somepath", "/somepath"),
            array("http://www.somehost.de/somepath/longer/deeper/stronger", "/somepath/longer/deeper/stronger"),
            array("http://www.somehost.de/somepath/longer/deeper/stronger/some_script.php", "/somepath/longer/deeper/stronger/some_script.php"),
            array("https://www.somehost.de", ""),
            array("://somehost.de", "://somehost.de"),
        );
    }
}
