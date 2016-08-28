<?php

use Weew\Http\Requests\CurrentRequest;
use Weew\HttpApp\HttpApp;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';
$kernel = require APP_DIR . '/kernel.php';
$parameters = require APP_DIR . '/parameters.php';
$configDirectory = APP_DIR . '/config';
$environment = array_get($parameters, 'env', 'prod');
$environments = array_get($parameters, 'envs', []);
$debug = array_get($parameters, 'debug', false);

$app = new HttpApp($environment, $debug);
$app->getKernel()->addProviders($kernel);
$app->getConfigLoader()
    ->addEnvironments($environments)
    ->addConfig($configDirectory)
    ->addConfig($parameters);

$app->handleRequest(new CurrentRequest())->send();
