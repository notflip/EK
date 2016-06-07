<?php namespace Notflip\Ek\Models;

class Bet {

    private $playerName;
    private $teamHome;
    private $teamAway;
    private $scoreHome;
    private $scoreAway;

    public function getPoints($scoreHome, $scoreAway)
    {
        // if the player's score is equal to the output score
        if(($scoreHome == $this->scoreHome) && ($scoreAway == $this->scoreAway)) {
            return "<span class=\"label label-warning\"><i class=\"glyphicon glyphicon-star\"></i> 3</span>";
        }

        // if its a draw. and the player also has a draw
        if(($scoreHome == $scoreAway) && ($this->scoreHome == $this->scoreAway)) {
            return "<span class=\"label label-warning\"><i class=\"glyphicon glyphicon-star\"></i> 1</span>";
        }

        // if the away team wins. and the player also has the away team winning regardless of score
        if($scoreHome < $scoreAway && $this->scoreHome < $this->scoreAway) {
            return "<span class=\"label label-warning\"><i class=\"glyphicon glyphicon-star\"></i> 1</span>";
        }

        // if the home team wins. and the player also has the home team winning regardless of score
        if($scoreHome > $scoreAway && $this->scoreHome > $this->scoreAway) {
            return "<span class=\"label label-warning\"><i class=\"glyphicon glyphicon-star\"></i> 1</span>";
        }

        return false;

        return false;
    }

    public function getPlayerName()
    {
        return $this->playerName;
    }

    public function setPlayerName($playerName)
    {
        $this->playerName = $playerName;
    }

    public function getTeamHome()
    {
        return $this->teamHome;
    }

    public function setTeamHome($teamHome)
    {
        $this->teamHome = $teamHome;
    }

    public function getTeamAway()
    {
        return $this->teamAway;
    }

    public function setTeamAway($teamAway)
    {
        $this->teamAway = $teamAway;
    }

    public function getScoreHome()
    {
        return $this->scoreHome;
    }

    public function setScoreHome($scoreHome)
    {
        $this->scoreHome = $scoreHome;
    }

    public function getScoreAway()
    {
        return $this->scoreAway;
    }

    public function setScoreAway($scoreAway)
    {
        $this->scoreAway = $scoreAway;
    }


}