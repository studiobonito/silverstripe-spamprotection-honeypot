<?php

use Symfony\Component\ClassLoader\ClassMapGenerator;

$loader = require __DIR__ . '/../vendor/autoload.php';

define('BASE_PATH', realpath(dirname(__DIR__)));

if (!file_exists(BASE_PATH . '/vendor/autoload.php')) {
    echo 'You must first install the vendors using composer.' . PHP_EOL;
    exit(1);
}

$classMap = ClassMapGenerator::createMap(BASE_PATH . '/framework');
unset($classMap['PHPUnit_Framework_TestCase']);
$loader->addClassMap($classMap);

//TODO: Find a nicer way to mock global methods
function _t($entity, $string = "", $context = "", $injection = "") {
    return $string;
}