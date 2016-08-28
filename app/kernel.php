<?php

use Weew\App\Doctrine\DoctrineProvider;
use Weew\App\ErrorHandler\BlackHole\BlackHoleErrorHandlerProvider;
use Weew\App\ErrorHandler\ErrorHandlerProvider;
use Weew\App\ErrorHandler\Monolog\MonologErrorHandlerProvider;
use Weew\App\Monolog\MonologProvider;
use Weew\App\SwiftMailer\SwiftMailerProvider;
use Weew\App\Twig\TwigProvider;
use Weew\HttpApp\ErrorHandler\Json\JsonErrorHandlerProvider;
use Weew\HttpApp\RequestHandler\RequestHandlerProvider;

return [
    ErrorHandlerProvider::class,
    MonologProvider::class,
    MonologErrorHandlerProvider::class,
    JsonErrorHandlerProvider::class,
    BlackHoleErrorHandlerProvider::class,
    DoctrineProvider::class,
    RequestHandlerProvider::class,
    TwigProvider::class,
    SwiftMailerProvider::class,
];
