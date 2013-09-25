<?php
namespace KeywordDensity\Validator\Url;

use KeywordDensity\Validator\Validator;

class Protocol implements Validator
{
    public function validate($param) {
        return $this->isHttp($param) || $this->isHttps($param);
    }

    private function isHttp($url) {
        return substr($url, 0, 7) === "http://";
    }

    private function isHttps($url) {
        return substr($url, 0, 8) === "https://";
    }
}