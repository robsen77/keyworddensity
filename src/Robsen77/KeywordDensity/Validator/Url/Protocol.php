<?php
namespace Robsen77\KeywordDensity\Validator\Url;

use Robsen77\KeywordDensity\Validator\Url\Validator;
use Robsen77\KeywordDensity\Parser\Url;

class Protocol implements Validator
{
    /**
     * @var Url
     */
    private $urlParser;

    /**
     * @var string
     */
    private $scheme;

    public function validate(Url $urlParser)
    {
        $this->urlParser = $urlParser;

        $this->scheme = $this->urlParser->getScheme();

        return $this->isHttp() || $this->isHttps();
    }

    private function isHttp()
    {
        return substr($this->scheme, 0, 7) === "http";
    }

    private function isHttps()
    {
        return substr($this->scheme, 0, 8) === "https";
    }
}