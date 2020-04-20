<?php

define('REPO_ROOT', __DIR__ . '/..');
define('TEST_ROOT', REPO_ROOT . '/tests');
define('LIB_ROOT', REPO_ROOT . '/src/lib');

$loader = require '/vendor/autoload.php';
$loader->addPsr4('MyApp\\tests\\', TEST_ROOT);
$loader->addPsr4('MyApp\\lib\\', LIB_ROOT);
