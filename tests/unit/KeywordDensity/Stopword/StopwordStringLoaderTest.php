<?php
use \KeywordDensity\Stopword\StopwordStringLoader;
use \KeywordDensity\Stopword\StopwordCollection;
use \KeywordDensity\Stopword\StopwordItem;

class StopwordStringLoaderTest extends \PHPUnit_Framework_TestCase
{
    protected $stopwordString = "test1 test2 test3";

    public function testLoadStopwordsByString() {
        $stopwordStringLoader = new StopwordStringLoader($this->stopwordString);

        $expectedCollection = new StopwordCollection();

        foreach(explode(" ", $this->stopwordString) as $stopword) {
            $stopwordItem = new StopwordItem($stopword);
            $expectedCollection->attach($stopwordItem);
        }

        $actualCollection = $stopwordStringLoader->getCollection();

        $this->assertEquals($expectedCollection->serialize(), $actualCollection->serialize());
    }
}