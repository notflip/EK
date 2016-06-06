<?php

require '../vendor/autoload.php';
date_default_timezone_set('Europe/Brussels');

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$container = new \Slim\Container($configuration);
$app = new \Slim\App($container);
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader);

require '../routes.php';

// Run application
$app->run();