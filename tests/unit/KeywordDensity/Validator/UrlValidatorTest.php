<?php
use KeywordDensity\Validator\UrlValidator;
use KeywordDensity\Validator\Url\Protocol;

class UrlValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \KeywordDensity\Validator\UrlValidator
     */
    private $urlValidator;

    public function setUp() {
        $this->urlValidator = new UrlValidator();
        $this->urlValidator->setValidator(new Protocol());
    }

    /**
     * @dataProvider positiveUrlDataProvider
     * @group integration
     */
    public function testPositiveUrls($url) {
        $this->assertTrue($this->urlValidator->validate($url));
    }

    public function positiveUrlDataProvider() {
        return array(
            array("http://www.google.de"),
            array("http://google.de"),
            array("http://www.google.de/#q=wefwefwef"),
            array("http://www.google.de/?somequerystring=test;+%20"),
            array("http::/www.google.de/?somequerystring=test;+%20"),
        );
    }

    /**
     * @dataProvider negativeUrlDataProvider
     * @group integration
     */
    public function testNegativeUrls($url) {
        $this->assertFalse($this->urlValidator->validate($url));
    }

    public function negativeUrlDataProvider() {
        return array(
            array("htp://www.google.de"),
            array("google.de"),
            array("www.google.de/#q=wefwefwef"),
        );
    }
}