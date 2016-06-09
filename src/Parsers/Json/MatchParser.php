<?php namespace Notflip\Ek\Parsers\Json;


use Notflip\Ek\Models\Match;
use Notflip\Ek\Parsers\JsonParser;

class MatchParser extends JsonParser {

    public function parse($url)
    {
        $data = $this->fetch($url)->fixtures;

        $items = [];
        foreach ($data as $item) {

            $teams = $this->fetch($item->_links);
            $hometeam = $teams->hometeam->href;
            $awayteam = $teams->awayTeam->href;

            $code = $this->generateCode($item->homeTeamName) . "-" . $this->generateCode($item->awayTeamName);
            $match = new Match();
            $match->setDate($item->date);
            $match->setStatus($item->status);
            $match->setMatchday($item->matchday);
            $match->setHometeam($item->homeTeamName);
            $match->setAwayteam($item->awayTeamName);
            $match->setHomeFlag($hometeam->crestUrl);
            $match->setAwayFlag($awayteam->crestUrl);
            $match->setHomeCode($this->generateCode($item->homeTeamName));
            $match->setAwayCode($this->generateCode($item->awayTeamName));
            $match->setHomeScore($item->result->goalsHomeTeam);
            $match->setAwayScore($item->result->goalsAwayTeam);
            $items[$code] = $match;
        }

        if(empty($items)) {
            throw new \Exception("No matches found");
        }
        return $items;
    }

    public function generateCode($string)
    {
        return strtoupper(substr($string,0,3));
    }

}