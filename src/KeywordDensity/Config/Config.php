<?php
namespace KeywordDensity\Config;
use KeywordDensity\Exception\Exception;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;


class Config
{
    public function get($path) {
        $configYml = $this->load($path);
        return $this->parse($configYml);
    }

    protected function parse($configYml) {
        $yaml = new Parser();
        $config = null;

        try {
            $config = $yaml->parse($configYml);
        } catch (ParseException $e) {
            throw new Exception(sprintf("Unable to parse the YAML string: %s", $e->getMessage()));
        }

        return $config;
    }

    protected function load($path) {
        if(!file_exists($path)) {
            throw new Exception(sprintf("Unable to load the YAML file: %s", $path));
        }

        return file_get_contents($path);
    }
}