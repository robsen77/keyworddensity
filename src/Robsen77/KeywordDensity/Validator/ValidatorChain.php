<?php

namespace Robsen77\KeywordDensity\Validator;

class ValidatorChain extends \SplObjectStorage
{
    public function validate($param)
    {
        $this->rewind();

        while ($this->valid()) {
            $validator = $this->current();

            if (!$validator->validate($param)) {
                return false;
            }

            $this->next();
        }

        return true;
    }
}