<?php
use Notflip\Ek\Collections\MatchCollection;
use Notflip\Ek\Collections\PlayerCollection;
use Notflip\Ek\Matcher;
use Notflip\Ek\Parsers\Json\MatchParser;
use Notflip\Ek\Parsers\Json\PlayerParser;

$app->get('/', function () use ($twig) {

    try {

        $players = new PlayerCollection((new PlayerParser())->parse('../data/players.json'));
        $matches = new MatchCollection((new MatchParser())->parse('http://api.football-data.org/v1/soccerseasons/424/fixtures'));

        $matcher = new Matcher($players, $matches);
        $matcher->check();

    } catch(JsonException $e) {
        die($e->getMessage());
    }

    echo $twig->render('home.html', [
        'matches' => $matches->byClosest(),
        'players' => $players->all()
    ]);

});