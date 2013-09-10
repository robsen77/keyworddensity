<?php
/**
 * @author Robert Bernhard <bloddynewbie@gmail.com>
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;
$app->run();