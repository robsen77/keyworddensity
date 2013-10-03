<?php
namespace Robsen77\KeywordDensity\Validator\Url;

use Robsen77\KeywordDensity\Validator\Url\Validator;
use Robsen77\KeywordDensity\Parser\Url;


class Path implements Validator
{
    const INVALID_SIGNS_PATTERN = "/[^a-z\d\/\-_.]+/i";
    /**
     * @var Url
     */
    private $urlParser;

    public function validate(Url $urlParser)
    {

        $this->urlParser = $urlParser;
        if ($this->pathContainsOnlyInvalidSigns()) {
            return false;
        }

        return true;
    }

    private function pathContainsOnlyInvalidSigns()
    {
        return preg_match(self::INVALID_SIGNS_PATTERN, $this->urlParser->getPath());
    }
}