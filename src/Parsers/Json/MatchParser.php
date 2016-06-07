<?php namespace Notflip\Ek\Parsers\Json;

use Notflip\Ek\Collections\PlayerCollection;
use Notflip\Ek\Models\Bet;
use Notflip\Ek\Models\Match;
use Notflip\Ek\Models\Player;
use Notflip\Ek\Parsers\JsonParser;

class MatchParser extends JsonParser {

    public function __construct(PlayerCollection $players)
    {
        $this->players = $players;
    }

    public function parse($url)
    {
        $data = $this->fetch($url)->fixtures;
        $players = $this->fetchPlayers();

        // Create a player object for each player
        foreach($players as $match => $item) {
            foreach($item as $name => $score) {
                if(!$this->players->has($name)) {
                    $player = new Player();
                    $player->setName($name);
                    $player->setPoints(0);
                    $this->players->add($name, $player);
                }
            }
        }

        // Create a match object for each match
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

            // Add players to the bet if the player has a bet on this match
            foreach($players[$code] as $name => $score) {

                $scores = explode('-', $score);
                $teams = explode('-', $code);

                $bet = new Bet();
                $bet->setPlayerName($name);
                $bet->setScoreHome($scores[0]);
                $bet->setScoreAway($scores[1]);
                $bet->setTeamHome($teams[0]);
                $bet->setTeamAway($teams[1]);
                $bets[$name] = $bet;
            }

            $match->setBets($bets);
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