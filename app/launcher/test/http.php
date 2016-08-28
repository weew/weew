<?php

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Tools\SchemaTool;
use Weew\HttpApp\HttpApp;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../../bootstrap.php';
$kernel = require APP_DIR . '/kernel.php';
$parameters = require APP_DIR . '/parameters.php';
$configDirectory = APP_DIR . '/config';
array_set($parameters, 'env', 'test');
$environment = array_get($parameters, 'env');
$environments = array_get($parameters, 'envs', []);
$debug = array_get($parameters, 'debug', false);

$app = new HttpApp($environment, $debug);
$app->getKernel()->addProviders($kernel);
$app->getConfigLoader()
    ->addEnvironments($environments)
    ->addConfig($configDirectory)
    ->addConfig($parameters);

////////////////////////////////////////////////////////////////////////////////

// empty cache
exec(s('rm -rf %s', VAR_DIR . '/cache/*/*'));

////////////////////////////////////////////////////////////////////////////////

$app->start();

/** @var ObjectManager $om */
$om = $app->getContainer()->get(ObjectManager::class);
$tool = new SchemaTool($om);
$metadata = $om->getMetadataFactory()->getAllMetadata();
$tool->dropSchema($metadata);
$tool->createSchema($metadata);

require APP_DIR . '/data/fixtures.php';

////////////////////////////////////////////////////////////////////////////////

return $app;
