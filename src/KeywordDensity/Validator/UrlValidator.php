<?php
namespace KeywordDensity\Validator;

use KeywordDensity\Validator\ValidatorChain;

class UrlValidator
{
    private $validatorChain;

    public function __construct() {
        $this->validatorChain = new ValidatorChain();
    }

    public function setValidator(Validator $validator) {
        $this->validatorChain->attach($validator);
    }

    public function validate($url) {
        return $this->validatorChain->validate($url);
    }
}