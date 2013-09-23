<?php

namespace KeywordDensity\Filter;

use KeywordDensity\Exception\StopwordException;

class Stopword
{
    protected $stopwords = array();

    public function __construct(array $stopwords) {
        foreach($stopwords as $stopwordRun) {
            $this->add($stopwordRun);
        }
    }

    public function add($stopword) {
        $trimmedValue = $this->preStopwordFilter($stopword);

        if($this->alreadyExists($trimmedValue)) {
            throw new StopwordException("could not add stopword, because the stopword already exists");
        }

        $this->stopwords[] = $trimmedValue;

        return true;
    }

    public function remove($stopword) {
        $trimmedValue = $this->preStopwordFilter($stopword);

        foreach($this->stopwords as $key => $stopwordRun) {
            if($stopwordRun == $trimmedValue) {
                unset($this->stopwords[$key]);

                return true;
            }
        }

        throw new StopwordException("could not remove stopword, because the stopword not exists");
    }

    protected function preStopwordFilter($stopword) {
        $trimmedValue = $this->trimStopword($stopword);

        if($this->isEmpty($trimmedValue)) {
            throw new StopwordException("could not add stopword, because the stopword is empty");
        }

        return $trimmedValue;
    }

    protected function trimStopword($stopword) {
        return trim($stopword);
    }

    protected function isEmpty($stopword) {
        return empty($stopword);
    }

    protected function alreadyExists($stopword) {
        foreach($this->stopwords as $stopwordRun) {
            if($stopword === $stopwordRun) {
                return true;
            }
        }

        return false;
    }
}