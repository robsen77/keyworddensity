<?php

namespace KeywordDensity\Stopword;

class StopwordCollection extends \SplObjectStorage
{
    public function attach($object, $data = null) {
        if($this->offsetExists($object)) {
            throw new StopwordCollectionException("stopword already exists");
        }

        parent::attach($object, $data);
    }

    public function detach($object) {
        if(!$this->offsetExists($object)) {
            throw new StopwordCollectionException("stopword doensn't exists");
        }

        parent::detach($object);
    }
}