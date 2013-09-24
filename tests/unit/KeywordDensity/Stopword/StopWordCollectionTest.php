<?php
use \KeywordDensity\Stopword\StopwordCollection;
use \KeywordDensity\Stopword\StopwordItem;

class StopWordCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \KeywordDensity\Stopword\StopwordCollectionException
     */
    public function testSetStopwordTwiceFails() {
        $stopwordItem = new StopwordItem("test");

        $stopwordCollection = new StopwordCollection();
        $stopwordCollection->add($stopwordItem);
        $stopwordCollection->add($stopwordItem);
    }

    public function testAddStopwordSuccess() {
        $stopwordItem = new StopwordItem("test");
        $stopwordCollection = new StopwordCollection();
        $this->assertTrue($stopwordCollection->add($stopwordItem));
    }

    /**
     * @expectedException \KeywordDensity\Stopword\StopwordCollectionException
     */
    public function testRemoveNotExistentStopword() {
        $stopwordItem = new StopwordItem("test");
        $stopwordCollection = new StopwordCollection();
        $stopwordCollection->remove($stopwordItem);
    }

    public function testRemoveStopwordSuccess() {
        $stopwordItem = new StopwordItem("test");
        $stopwordCollection = new StopwordCollection();
        $stopwordCollection->add($stopwordItem);
        $stopwordCollection->remove($stopwordItem);
    }
}