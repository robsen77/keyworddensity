<?php
namespace KeywordDensity\Validator;

use KeywordDensity\Parser\Url as UrlParser;
use KeywordDensity\Validator\Url\Validator;
use KeywordDensity\Validator\ValidatorChain;

class UrlValidator
{
    /**
     * @var ValidatorChain
     */
    private $validatorChain;

    public function __construct() {
        $this->validatorChain = new ValidatorChain();
    }

    public function setValidator(Validator $validator) {
        $this->validatorChain->attach($validator);
    }

    public function validate($url) {
        $urlParser = new UrlParser();
        $urlParser->parse($url);

        return $this->validatorChain->validate($urlParser);
    }
}