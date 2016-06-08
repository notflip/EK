<?php namespace Notflip\Ek;

use Notflip\Ek\Collections\MatchCollection;
use Notflip\Ek\Collections\PlayerCollection;

class Matcher {

    public function __construct(PlayerCollection $players, MatchCollection $matches)
    {
        $this->players = $players;
        $this->matches = $matches;
    }

    public function check()
    {
        // For every player get the bets
        foreach($this->players->all() as $player) {

            $bets = $player->getBets();

            // Loop all the bets for this player
            foreach($bets as $bet) {

                $code = $bet->getHomeTeam() . "-" . $bet->getAwayTeam();

                // If the bet is an existing match
                if($match = $this->matches->find($code)) {

                    $match->addBet($bet);

                    // Compare the player score with the match score if the match is passed
                    if($match->isPassed()) {

                        $points = $this->calculatePoints($match, $bet);
                        $bet->setPoints($points);
                        $player->addPoints($points);

                    }
                }
            }
        }
    }

    public function calculatePoints($match, $bet)
    {
        // if the player's score is equal to the output score
        if(($bet->getHomeScore() == $match->getHomeScore()) && ($bet->getAwayScore() == $match->getAwayScore())) {
            return 3;
        }

        // if its a draw. and the player also has a draw
        if(($match->getHomeScore() == $match->getAwayScore()) && ($bet->getHomeScore() == $bet->getAwayScore())) {
            return 1;
        }

        // if the away team wins. and the player also has the away team winning regardless of score
        if($match->getHomeScore() < $match->getAwayScore() && $bet->getHomeScore() < $bet->getAwayScore()) {
            return 1;
        }

        // if the home team wins. and the player also has the home team winning regardless of score
        if($match->getHomeScore() > $match->getAwayScore() && $bet->getHomeScore() > $bet->getAwayScore()) {
            return 1;
        }

        return false;
    }

}