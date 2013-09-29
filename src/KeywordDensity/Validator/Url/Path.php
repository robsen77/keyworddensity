<?php
/**
 * Path.php
 *
 * class description here
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 29.09.13
 * Time: 12:25
 */

namespace KeywordDensity\Validator\Url;
use KeywordDensity\Validator\Url\Validator;
use KeywordDensity\Parser\Url;


class Path implements Validator
{
    const INVALID_SIGNS_PATTERN = "/[^a-z\d\/\-_.]+/i";
    /**
     * @var Url
     */
    private $urlParser;

    public function validate(Url $urlParser) {

        $this->urlParser = $urlParser;
        if($this->pathContainsOnlyInvalidSigns()) {
            return false;
        }

        return true;
    }

    private function pathContainsOnlyInvalidSigns() {
        return preg_match(self::INVALID_SIGNS_PATTERN, $this->urlParser->getPath());
    }
}