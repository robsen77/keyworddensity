<?php
namespace Robsen77\KeywordDensity\Parser;


interface Parser
{
    public function parse($param);

    public function __get($key);

    public function __call($method, $params);
}