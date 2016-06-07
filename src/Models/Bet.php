<?php namespace Notflip\Ek\Models;

class Bet {

    private $playerName;
    private $teamHome;
    private $teamAway;
    private $scoreHome;
    private $scoreAway;

    public function getPoints($homeScore, $awayScore)
    {
        // if the player's score is equal to the output score
        if(($homeScore == $this->homeScore) && ($awayScore == $this->awayScore)) {
            return "<span class=\"label label-warning\"><i class=\"glyphicon glyphicon-star\"></i> 3</span>";
        }

        // if both scores are equal to each other and equal to one another
        if(($homeScore == $awayScore) && ($this->homeScore == $this->awayScore)) {
            return "<span class=\"label label-warning\"><i class=\"glyphicon glyphicon-star\"></i> 1</span>";
        }

        if($homeScore < $awayScore && $this->homeScore < $this->awayScore) {
            return "<span class=\"label label-warning\"><i class=\"glyphicon glyphicon-star\"></i> 1</span>";
        }

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