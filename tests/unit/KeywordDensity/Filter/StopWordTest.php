<?php
use \KeywordDensity\Filter\Stopword;

class StopWordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \KeywordDensity\Exception\StopwordException
     */
    public function testAddEmptyStopword() {
        $stopwordInstance = new Stopword(array());
        $stopwordInstance->add("");
    }

    /**
     * @expectedException \KeywordDensity\Exception\StopwordException
     */
    public function testStopwordIsAlreadyGiven() {
        $stopwordInstance = new Stopword(array("test"));
        $stopwordInstance->add("test");
    }

    public function testAddStopword() {
        $stopwordInstance = new Stopword(array());

        $this->assertTrue($stopwordInstance->add("test"));
    }
    /**
     * @expectedException \KeywordDensity\Exception\StopwordException
     */
    public function testRemoveEmptyStopword() {
        $stopwordInstance = new Stopword(array());
        $stopwordInstance->remove("");
    }

    /**
     * @expectedException \KeywordDensity\Exception\StopwordException
     */
    public function testRemoveNotExistentStopword() {
        $stopwordInstance = new Stopword(array("test"));
        $stopwordInstance->remove("test222");
    }

    public function testRemoveStopword() {
        $stopwordInstance = new Stopword(array("test"));

        $this->assertTrue($stopwordInstance->remove("test"));
    }
}