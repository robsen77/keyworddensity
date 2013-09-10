<?php
/**
 * This file is part of keyworddensity.
 *
 * (c) Robert Bernhard <bloddynewbie@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function includeIfExists($file) {
    return file_exists($file) ? include $file : false;
}

$loader = includeIfExists(__DIR__ . '/../vendor/autoload.php');

if ($loader === false) {
    echo 'You must set up the project dependencies, run the following commands:' . PHP_EOL.
        'curl -sS https://getcomposer.org/installer | php -- --install-dir=bin' . PHP_EOL.
        'php bin/composer.phar install' . PHP_EOL;
    exit(1);
}

return $loader;