<?php
namespace KeywordDensity\Validator\Url;

use KeywordDensity\Validator\Validator;

class StartsWithHttp implements Validator
{
    public function validate($param) {
        return substr($param, 0, 4) === "http";
    }
}