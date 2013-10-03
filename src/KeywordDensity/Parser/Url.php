<?php
namespace KeywordDensity\Parser;

/**
 * Class Url
 * @package KeywordDensity\Parser
 *
 * @method string getScheme()
 * @method string getHost()
 * @method string getPort()
 * @method string getPath()
 * @method string getQuery()
 * @method string getFragment()
 * @method string extractScheme()
 * @method string extractHost()
 * @method string extractPort()
 * @method string extractPath()
 * @method string extractQuery()
 * @method string extractFragment()
 */
class Url implements Parser
{
    private $url;
    private $parsedUrl;
    private $scheme;
    private $host;
    private $port;
    private $path;
    private $query;
    private $fragment;

    public function parse($url)
    {
        $this->url = $url;
        $this->parsedUrl = parse_url($url);

        $this->extractScheme();
        $this->extractHost();
        $this->extractPort();
        $this->extractPath();
        $this->extractQuery();
        $this->extractFragment();
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __call($method, $params)
    {
        if (strpos($method, "extract") === 0) {
            $key = strtolower(str_replace("extract", "", $method));
            return $this->extractValue($key);
        }

        if (strpos($method, "get") === 0) {
            $key = strtolower(str_replace("get", "", $method));
            return $this->__get($key);
        }

        return false;
    }

    private function extractValue($key)
    {
        $this->$key = "";

        if (isset($this->parsedUrl[$key])) {
            $this->$key = $this->parsedUrl[$key];
            return true;
        }

        return false;
    }
}