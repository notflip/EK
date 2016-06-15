<?php

function makeMatchCode($match) {
    return $match->getHomeCode() . "-" . $match->getAwayCode();
}

function moveUpInArray(&$array, $key) {
    $temp = array($key => $array[$key]);
    unset($array[$key]);
    $array = $temp + $array;
}