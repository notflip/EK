<?php
use Notflip\Ek\Parsers\Json\MatchParser;

$app->get('/', function () use ($twig) {

    $matchParser = new MatchParser();
    try {
        //$matches = $matchParser->parse('http://api.football-data.org/v1/soccerseasons/424/fixtures');
        $matches = $matchParser->parse('../data/data.json');
    } catch(JsonException $e) {
        die($e->getMessage());
    }

    echo $twig->render('home.html', [
        'matches' => $matches
    ]);
});

$app->get('/update', function() {
    // Add the update ajax functions
});