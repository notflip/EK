<?php namespace Notflip\Ek\Parsers\Json;

use Notflip\Ek\Models\Match;
use Notflip\Ek\Parsers\JsonParser;

class MatchParser extends JsonParser {

    private $players;

    public function parse($url)
    {
        $data = $this->fetch($url)->fixtures;
        $this->players = $this->getPlayers();

        $items = [];
        foreach ($data as $item) {
            $match = new Match();
            $match->setHomeCode($this->generateCode($item->homeTeamName));
            $match->setAwayCode($this->generateCode($item->awayTeamName));
            $match->setDate($item->date);
            $match->setStatus($item->status);
            $match->setMatchday($item->matchday);
            $match->setHometeam($item->homeTeamName);
            $match->setAwayteam($item->awayTeamName);
            $match->setResult($this->generateResult($item->result));
            $match->setPlayers($this->generatePlayers($match->getHomeCode(), $match->getAwayCode()));
            $items[$item->matchday][] = $match;
        }

        if(empty($items)) {
            throw new \Exception("No matches found");
        }
        return $items;
    }

    public function getPlayers()
    {
        return json_decode(file_get_contents('../data/players.json'), true);
    }

    public function generateCode($string)
    {
        return strtoupper(substr($string,0,3));
    }

    public function generateResult($result)
    {
        $home = $result->goalsHomeTeam == null ? 0 : $result->goalsHomeTeam;
        $away = $result->goalsAwayTeam == null ? 0 : $result->goalsAwayTeam;
        return $home . " - " . $away;
    }

    public function generatePlayers($home, $away)
    {
        $code = $home . "-" . $away;
        return isset($this->players[$code]) ? $this->players[$code] : null;
    }
}