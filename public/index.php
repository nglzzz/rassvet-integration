<?php

require __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_PATH', realpath(__DIR__ . '/../'));

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(APPLICATION_PATH);
$dotenv->load();

require_once APPLICATION_PATH . '/bootstrap/app.php';
