#!/usr/bin/env php
<?php

// this is a launcher for the doctrine's console runner;
// you launch it with the "app/bin/doctrine" command;

use Weew\App\App;
use Weew\App\Doctrine\DoctrineConsoleRunner;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';
$kernel = require APP_DIR . '/kernel.php';
$parameters = require APP_DIR . '/parameters.php';
$configDirectory = APP_DIR . '/config';
$environment = array_get($parameters, 'env', 'prod');
$environments = array_get($parameters, 'envs', []);
$debug = array_get($parameters, 'debug', false);

// empty cache
exec(s('rm -rf %s', VAR_DIR . '/cache/*/*'));

$app = new App($environment, $debug);
$app->getKernel()->addProviders($kernel);
$app->getConfigLoader()
    ->addEnvironments($environments)
    ->addConfig($configDirectory)
    ->addConfig($parameters);
$app->start();

/** @var DoctrineConsoleRunner $runner */
$runner = $app->getContainer()->get(DoctrineConsoleRunner::class);
$runner->run();

$app->shutdown();
