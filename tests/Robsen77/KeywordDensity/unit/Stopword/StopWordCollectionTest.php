<?php
use \Robsen77\KeywordDensity\Stopword\StopwordCollection;
use \Robsen77\KeywordDensity\Stopword\StopwordItem;

class StopWordCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Robsen77\KeywordDensity\Exception\StopwordCollectionException
     */
    public function testSetStopwordTwiceFails()
    {
        $stopwordItem = new StopwordItem("test");

        $stopwordCollection = new StopwordCollection();
        $stopwordCollection->attach($stopwordItem);
        $stopwordCollection->attach($stopwordItem);
    }

    /**
     * @expectedException \Robsen77\KeywordDensity\Exception\StopwordCollectionException
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