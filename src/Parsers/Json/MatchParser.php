<?php namespace Notflip\Ek\Parsers\Json;

use Notflip\Ek\Models\Match;
use Notflip\Ek\Models\Player;
use Notflip\Ek\Parsers\JsonParser;

class MatchParser extends JsonParser {

    private $players;

    public function parse($url)
    {
        $data = $this->fetch($url)->fixtures;
        $this->players = $this->fetchPlayers();

        $items = [];
        foreach ($data as $item) {
            $match = new Match();
            $match->setDate($item->date);
            $match->setStatus($item->status);
            $match->setMatchday($item->matchday);
            $match->setHometeam($item->homeTeamName);
            $match->setAwayteam($item->awayTeamName);
            $match->setHomeCode($this->generateCode($item->homeTeamName));
            $match->setAwayCode($this->generateCode($item->awayTeamName));
            $match->setHomeScore($item->result->goalsHomeTeam);
            $match->setAwayScore($item->result->goalsAwayTeam);

            $code = $match->getHomeCode() . "-" . $match->getAwayCode();

            $players = [];
            foreach($this->players[$code] as $name => $score) {

                $scores = explode('-', $score);
                $teams = explode('-', $code);

                $player = new Player();
                $player->setName($name);
                $player->setHomeCode($teams[0]);
                $player->setAwayCode($teams[1]);
                $player->setHomeScore((int) $scores[0]);
                $player->setAwayScore((int) $scores[1]);
                $players[] = $player;
            }

            $match->setPlayers($players);
            $items[] = $match;
        }

        if(empty($items)) {
            throw new \Exception("No matches found");
        }
        return $items;
    }

    public function fetchPlayers()
    {
        return json_decode(file_get_contents('../data/players.json'), true);
    }

    public function generateCode($string)
    {
        return strtoupper(substr($string,0,3));
    }
}