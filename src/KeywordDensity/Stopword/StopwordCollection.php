<?php

namespace KeywordDensity\Stopword;

class StopwordCollection
{
    /**
     * StopwordItem Collection
     * @var array
     */
    protected $stopwords = array();

    public function add(StopwordItem $stopword) {
        if($this->alreadyExists($stopword)) {
            throw new StopwordCollectionException("could not add stopword, because the stopword already exists");
        }

        $this->stopwords[] = $stopword;

        return true;
    }

    public function remove(StopwordItem $stopword) {
        foreach($this->stopwords as $key => $stopwordRun) {
            if($stopword === $stopwordRun) {
                unset($this->stopwords[$key]);

                return true;
            }
        }

        throw new StopwordCollectionException("could not remove stopword, because the stopword not exists");
    }

    protected function alreadyExists(StopwordItem $stopword) {
        foreach($this->stopwords as $stopwordRun) {
            if($stopword === $stopwordRun) {
                return true;
            }
        }

        return false;
    }
}