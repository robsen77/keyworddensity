<?php
use Robsen77\KeywordDensity\Validator\UrlValidator;
use Robsen77\KeywordDensity\Validator\Url\Protocol;
use Robsen77\KeywordDensity\Validator\ValidatorChain;

class UrlValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Robsen77\KeywordDensity\Validator\UrlValidator
     */
    private $urlValidator;

    public function setUp()
    {
        $chain = new ValidatorChain();
        $this->urlValidator = new UrlValidator($chain);
        $this->urlValidator->setValidator(new Protocol());
    }

    /**
     * @dataProvider positiveUrlDataProvider
     * @group integration
     */
    public function testPositiveUrls($url)
    {
        $this->assertTrue($this->urlValidator->validate($url));
    }

    public function positiveUrlDataProvider()
    {
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
    public function testNegativeUrls($url)
    {
        $this->assertFalse($this->urlValidator->validate($url));
    }

    public function negativeUrlDataProvider()
    {
        return array(
            array("htp://www.google.de"),
            array("google.de"),
            array("www.google.de/#q=wefwefwef"),
        );
    }
}