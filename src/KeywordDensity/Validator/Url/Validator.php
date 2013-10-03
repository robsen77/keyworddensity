<?php
namespace KeywordDensity\Validator\Url;

use KeywordDensity\Parser\Url;

interface Validator
{
    public function validate(Url $urlParser);
}