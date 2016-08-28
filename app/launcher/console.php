#!/usr/bin/env php

<?php

// this is a launcher for the command line commands;

use Weew\ConsoleApp\ConsoleApp;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';
$kernel = require APP_DIR . '/kernel.php';
$commands = require APP_DIR . '/console.php';
$parameters = require APP_DIR . '/parameters.php';
$configDirectory = APP_DIR . '/config';
$environment = array_get($parameters, 'env', 'prod');
$environments = array_get($parameters, 'envs', []);
$debug = array_get($parameters, 'debug', false);

$app = new ConsoleApp($environment, $debug);
$app->getKernel()->addProviders($kernel);
$app->getConsole()->addCommands($commands);
$app->getConfigLoader()
    ->addEnvironments($environments)
    ->addConfig($configDirectory)
    ->addConfig($parameters);

$app->handleArgv($argv);

return $app;
