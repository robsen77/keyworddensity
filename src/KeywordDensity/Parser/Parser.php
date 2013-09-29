<?php
/**
 * Parser.php
 *
 * class description here
 *
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 * Date: 29.09.13
 * Time: 15:24
 */

namespace KeywordDensity\Parser;


interface Parser
{
    public function parse($param);
    public function __get($key);
    public function __call($method, $params);
}