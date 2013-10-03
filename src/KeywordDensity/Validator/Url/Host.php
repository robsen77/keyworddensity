<?php
namespace KeywordDensity\Validator\Url;

use KeywordDensity\Parser\Url;
use KeywordDensity\Validator\Url\Validator;

class Host implements Validator
{
    const IPV4_PATTERN = "/^(25[0-5]|2[0-4]\\d|[0-1]?\\d?\\d)(\\.(25[0-5]|2[0-4]\\d|[0-1]?\\d?\\d)){3}$/";
//    const IPV6_PATTERN = "/^(?:[0-9a-fA-F]{1,4}:){7}[0-9a-fA-F]{1,4}$/";
//    const IPV6_PATTERN_HEX_COMPRESSED = "/^((?:[0-9A-Fa-f]{1,4}(?::[0-9A-Fa-f]{1,4})*)?)::((?:[0-9A-Fa-f]{1,4}(?::[0-9A-Fa-f]{1,4})*)?)$/";

    /**
     * @var Url
     */
    private $urlParser;

    /**
     * @var string
     */
    private $host;

    public function validate(Url $urlParser)
    {
        $this->urlParser = $urlParser;
        $this->host = $this->getHost();

        if ($this->isIpAddress() && !$this->isValidIpAddress()) {
            return false;
        }

        return $this->containsValidToken();
    }

    private function getHost()
    {
        return $this->urlParser->getHost();
    }

    private function containsValidToken()
    {
        return !preg_match("/[^a-z\d.\-]{1,}/i", $this->host);
    }

    private function isIpAddress()
    {
        return !preg_match("/[^\d.]/", $this->host);
    }

    /**
     * @param $host
     * @return int
     * @todo IPV6 validation
     */
    private function isValidIpAddress()
    {
        return preg_match(self::IPV4_PATTERN, $this->host);
//        || preg_match(self::IPV6_PATTERN, $host)
//        || preg_match(self::IPV6_PATTERN_HEX_COMPRESSED, $host);
    }
}