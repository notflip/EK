<?php

require '../vendor/autoload.php';

/* Caching */
use phpFastCache\CacheManager;
CacheManager::setup(["path" => "C:/tmp/"]);
CacheManager::CachingMethod("phpfastcache");

/* Locale */
date_default_timezone_set('Europe/Brussels');

/* Slim */
$container = new \Slim\Container(['settings' => ['displayErrorDetails' => true]]);
$app = new \Slim\App($container);

/* Twig */
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, ['debug' => true]);
$twig->addExtension(new Twig_Extensions_Extension_Intl());
$twig->addExtension(new Twig_Extension_Debug());

require '../config/twig/filters.php';
require '../src/routes.php';

// Run application
$app->run();