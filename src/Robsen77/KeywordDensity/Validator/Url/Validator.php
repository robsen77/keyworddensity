<?php
namespace Robsen77\KeywordDensity\Validator\Url;

use Robsen77\KeywordDensity\Parser\Url;

interface Validator
{
    public function validate(Url $urlParser);
}