<?php
/**
 * This file is part of keyworddensity.
 *
 * (c) Robert Bernhard <bloddynewbie@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

error_reporting(E_ALL);

$loader = require __DIR__.'/../src/bootstrap.php';
$loader->add('KeywordDensity\Test', __DIR__);