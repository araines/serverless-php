<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Raines\Serverless\Context;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

// Set up service container
$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/config'));
$loader->load('services.yml');

// Get event data and context object
$event = json_decode($argv[1], true) ?: [];
$logger = $container->get('logger');
$fd = fopen('php://fd/3', 'r+');
$context = new Context($logger, $argv[2], $fd);

// Get the handler service and execute
$handler = $container->get(getenv('HANDLER'));
$response = $handler->handle($event, $context);

// Send data back to shim
printf(json_encode($response));
