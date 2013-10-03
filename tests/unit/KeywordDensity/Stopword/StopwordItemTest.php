<?php
use \KeywordDensity\Stopword\StopwordItem;

class StopwordItemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \KeywordDensity\Exception\StopwordException
     */
    public function testSetEmptyStopword()
    {
        new StopwordItem("");
    }

    public function testGetStopwordSucces()
    {
        $compareString = "test";
        $stopword = new StopwordItem($compareString);
        $this->assertEquals($compareString, $stopword->get());
    }
}