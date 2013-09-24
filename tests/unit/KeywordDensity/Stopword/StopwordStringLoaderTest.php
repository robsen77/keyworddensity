<?php
use \KeywordDensity\Stopword\StopwordStringLoader;
use \KeywordDensity\Stopword\StopwordCollection;
use \KeywordDensity\Stopword\StopwordItem;

class StopwordStringLoaderTest extends \PHPUnit_Framework_TestCase
{
    protected $stopwordString = "test1 test2 test3";

    public function testLoadStopwordsByString() {
        $stopwordStringLoader = new StopwordStringLoader($this->stopwordString);

        $stopwordCollection = new StopwordCollection();

        foreach(explode(" ", $this->stopwordString) as $stopword) {
            $stopwordItem = new StopwordItem($stopword);
            $stopwordCollection->add($stopwordItem);
        }

        $this->assertEquals($stopwordCollection, $stopwordStringLoader->getCollection());
    }
}