<?php
use Notflip\Ek\Collections\MatchCollection;
use Notflip\Ek\Parsers\Json\MatchParser;

$app->get('/', function () use ($twig) {

    try {
        //$matches = $matchParser->parse('http://api.football-data.org/v1/soccerseasons/424/fixtures');
        $matchParser = new MatchParser();
        $matches = new MatchCollection($matchParser->parse('../data/data.json'));
    } catch(JsonException $e) {
        die($e->getMessage());
    }


    echo $twig->render('home.html', [
        'matches' => $matches->all()
    ]);
});

$app->get('/update', function() {
    // Add the update ajax functions
});