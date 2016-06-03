<?php namespace Notflip\Ek\Parsers\Json;

use Notflip\Ek\Models\Match;
use Notflip\Ek\Parsers\JsonParser;

class MatchParser extends JsonParser {

    public function parse($url)
    {
        $data = $this->fetch($url)->fixtures;

        $items = [];
        foreach ($data as $item) {
            $match = new Match();
            $match->setCode($this->generateCode($item->homeTeamName, $item->awayTeamName));
            $match->setDate($item->date);
            $match->setStatus($item->status);
            $match->setMatchday($item->matchday);
            $match->setHometeam($item->homeTeamName);
            $match->setAwayteam($item->awayTeamName);
            $match->setResult($this->generateResult($item->result));
            $items[$item->matchday][] = $match;
        }

        if(empty($items)) {
            throw new \Exception("No matches found");
        }
        return $items;
    }

    public function generateCode($home, $away)
    {
        return strtoupper(substr($home,0,3) . "-" .substr($away,0,3));
    }

    public function generateResult($result)
    {
        $home = $result->goalsHomeTeam == null ? 0 : $result->goalsHomeTeam;
        $away = $result->goalsAwayTeam == null ? 0 : $result->goalsAwayTeam;
        return $home . " - " . $away;
    }
}