<?php
use \KeywordDensity\Stopword\StopwordCollection;
use \KeywordDensity\Stopword\StopwordItem;

class StopWordCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \KeywordDensity\Exception\StopwordCollectionException
     */
    public function testSetStopwordTwiceFails()
    {
        $stopwordItem = new StopwordItem("test");

        $stopwordCollection = new StopwordCollection();
        $stopwordCollection->attach($stopwordItem);
        $stopwordCollection->attach($stopwordItem);
    }

    /**
     * @expectedException \KeywordDensity\Exception\StopwordCollectionException
     */
    public function testRemoveNotExistentStopword()
    {
        $stopwordItem = new StopwordItem("test");
        $stopwordCollection = new StopwordCollection();
        $stopwordCollection->detach($stopwordItem);
    }

    public function testRemoveStopwordSuccess()
    {
        $stopwordItem = new StopwordItem("test");
        $stopwordCollection = new StopwordCollection();
        $stopwordCollection->attach($stopwordItem);
        $stopwordCollection->detach($stopwordItem);
    }
}