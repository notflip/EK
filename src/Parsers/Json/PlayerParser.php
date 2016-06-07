<?php namespace Notflip\Ek\Parsers\Json;

use Notflip\Ek\Models\Bet;
use Notflip\Ek\Models\Player;
use Notflip\Ek\Parsers\JsonParser;

class PlayerParser extends JsonParser {

    public function parse($url)
    {
        $raw = $this->fetch($url);

        $items = [];
        foreach ($raw as $name => $userbets) {

            $player = new Player();
            $player->setName($name);

            $bets = [];

            foreach($userbets as $team => $score) {

                $teams = explode('-', $team);
                $scores = explode('-', $score);

                $bet = new Bet();
                $bet->setPlayer($name);
                $bet->setHomeTeam($teams[0]);
                $bet->setAwayTeam($teams[1]);
                $bet->setHomeScore((int)$scores[0]);
                $bet->setAwayScore((int)$scores[1]);
                $bets[] = $bet;
            }

            $player->setBets($bets);
            $items[$name] = $player;
        }

        if(empty($items)) {
            throw new \Exception("No players found");
        }

        return $items;
    }

}