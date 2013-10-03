<?php
namespace KeywordDensity\Stopword;


use KeywordDensity\Exception\StopwordException;

class StopwordItem
{
    protected $stopword = "";

    public function __construct($stopword)
    {
        $this->stopword = $stopword;
        $this->check();
    }

    public function get()
    {
        return $this->stopword;
    }

    protected function check()
    {
        $this->trimStopword();

        if ($this->isEmpty()) {
            throw new StopwordException("could not create stopword, because the stopword is empty");
        }

        return true;
    }

    protected function trimStopword()
    {
        $this->stopword = trim($this->stopword);
    }

    protected function isEmpty()
    {
        return empty($this->stopword);
    }
}