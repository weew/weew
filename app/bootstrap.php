<?php

if ( ! defined('ROOT_DIR')) {
    define('ROOT_DIR', realpath(__DIR__ . '/..'));
}

if ( ! defined('APP_DIR')) {
    define('APP_DIR', ROOT_DIR . '/app');
}

if ( ! defined('SRC_DIR')) {
    define('SRC_DIR', ROOT_DIR . '/src');
}

if ( ! defined('VAR_DIR')) {
    define('VAR_DIR', ROOT_DIR . '/var');
}

if ( ! defined('WEB_DIR')) {
    define('WEB_DIR', ROOT_DIR . '/web');
}

if ( ! defined('BIN_DIR')) {
    define('BIN_DIR', ROOT_DIR . '/bin');
}

if ( ! defined('VENDOR_DIR')) {
    define('VENDOR_DIR', ROOT_DIR . '/vendor');
}

require_once __DIR__ . '/../vendor/autoload.php';
