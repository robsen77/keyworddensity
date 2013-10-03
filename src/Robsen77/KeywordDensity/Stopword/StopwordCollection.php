<?php
/**
 * StopwordCollection
 *
 * a SplObjectStorage for StopwordItem objects
 */
namespace Robsen77\KeywordDensity\Stopword;

use Robsen77\KeywordDensity\Exception\StopwordCollectionException;

class StopwordCollection extends \SplObjectStorage
{
    /**
     * @param object $object
     * @param null $data
     * @throws StopwordCollectionException
     */
    public function attach($object, $data = null)
    {
        if ($this->offsetExists($object)) {
            throw new StopwordCollectionException("stopword already exists");
        }

        parent::attach($object, $data);
    }

    /**
     * @param object $object
     * @throws StopwordCollectionException
     */
    public function detach($object)
    {
        if (!$this->offsetExists($object)) {
            throw new StopwordCollectionException("stopword doensn't exists");
        }

        parent::detach($object);
    }
}