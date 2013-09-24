<?php
namespace KeywordDensity\Stopword;


class StopwordStringLoader
{
    /**
     * @var \KeywordDensity\Stopword\StopwordCollection
     */
    protected $stopwordCollection;

    public function __construct($stopwordString) {
        $stopwordArray = $this->toArray($stopwordString);

        $this->stopwordCollection = new StopwordCollection();

        foreach($stopwordArray as $stopword) {
            $stopwordItem = new StopwordItem($stopword);
            $this->stopwordCollection->attach($stopwordItem);
        }
    }

    public function getCollection() {
        return $this->stopwordCollection;
    }

    protected function toArray($stopwordString) {
        $stopwordString = $this->removeCarriageReturn($stopwordString);
        $stopwordString = $this->replaceNewlineBySpace($stopwordString);
        $stopwordString = $this->replaceMultispace($stopwordString);

        return $this->splitBySpace($stopwordString);
    }

    protected function removeCarriageReturn($stopwordString) {
        return str_replace("\r", "", $stopwordString);
    }

    protected function replaceNewlineBySpace($stopwordString) {
        return str_replace("\n", " ", $stopwordString);
    }

    protected function replaceMultispace($stopwordString) {
        return preg_replace("/\s{2,}/", " ", $stopwordString);
    }

    protected function splitBySpace($stopwordString) {
        return explode(" ", $stopwordString);
    }
}