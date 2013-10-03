<?php
namespace Robsen77\KeywordDensity\Validator;

use Robsen77\KeywordDensity\Parser\Url as UrlParser;
use Robsen77\KeywordDensity\Validator\Url\Validator;
use Robsen77\KeywordDensity\Validator\ValidatorChain;

class UrlValidator
{
    /**
     * @var ValidatorChain
     */
    private $validatorChain;

    public function __construct(ValidatorChain $validatorChain)
    {
        $this->validatorChain = $validatorChain;
    }

    public function setValidator(Validator $validator)
    {
        $this->validatorChain->attach($validator);
    }

    public function validate($url)
    {
        $urlParser = new UrlParser();
        $urlParser->parse($url);

        return $this->validatorChain->validate($urlParser);
    }
}