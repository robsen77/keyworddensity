<?php
namespace KeywordDensity\Validator\Url;

use KeywordDensity\Validator\Validator;

class Host implements Validator
{
    const IPV4_PATTERN = "/^(25[0-5]|2[0-4]\\d|[0-1]?\\d?\\d)(\\.(25[0-5]|2[0-4]\\d|[0-1]?\\d?\\d)){3}$/";
//    const IPV6_PATTERN = "/^(?:[0-9a-fA-F]{1,4}:){7}[0-9a-fA-F]{1,4}$/";
//    const IPV6_PATTERN_HEX_COMPRESSED = "/^((?:[0-9A-Fa-f]{1,4}(?::[0-9A-Fa-f]{1,4})*)?)::((?:[0-9A-Fa-f]{1,4}(?::[0-9A-Fa-f]{1,4})*)?)$/";

    public function validate($param) {
        $host = $this->getHost($param);

        if($this->isIpAddress($host) && !$this->isValidIpAddress($host)) {
            return false;
        }

        return $this->containsValidToken($host);
    }

    private function getHost($url) {
        $parseUrl = parse_url($url);

        return isset($parseUrl['host']) ? $parseUrl['host'] : null;
    }

    private function containsValidToken($host) {
        return !preg_match("/[^a-z\d.\-]{1,}/i", $host);
    }

    private function isIpAddress($host) {
        return !preg_match("/[^\d.]/", $host);
    }

    /**
     * @param $host
     * @return int
     * @todo IPV6 validation
     */
    private function isValidIpAddress($host) {
        return preg_match(self::IPV4_PATTERN, $host);
//        || preg_match(self::IPV6_PATTERN, $host)
//        || preg_match(self::IPV6_PATTERN_HEX_COMPRESSED, $host);
    }
}