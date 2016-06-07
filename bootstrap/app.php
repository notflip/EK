<?php

require '../vendor/autoload.php';
date_default_timezone_set('Europe/Brussels');
setlocale(LC_ALL, 'be_NL');

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$container = new \Slim\Container($configuration);
$app = new \Slim\App($container);
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, ['debug' => true]);
$twig->addExtension(new Twig_Extensions_Extension_Intl());
$twig->addExtension(new Twig_Extension_Debug());

require '../src/routes.php';

// Run application
$app->run();