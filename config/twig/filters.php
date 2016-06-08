<?php

$sortbyscore = new Twig_SimpleFilter('sortbyscore', function ($players) {
    usort($players, function($a, $b) {
        return ($a->getPoints() > $b->getPoints()) ? -1 : 1;
    });
    return $players;
});
$twig->addFilter($sortbyscore);