<?php namespace Notflip\Ek\Models;


class Bet {

    private $player;
    private $points;
    private $homeTeam;
    private $awayTeam;
    private $homeScore;
    private $awayScore;

    public function getPlayer()
    {
        return $this->player;
    }

    public function setPlayer($player)
    {
        $this->player = $player;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }

    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    public function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;
    }

    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    public function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;
    }


    public function getHomeScore()
    {
        return $this->homeScore;
    }

    public function setHomeScore($homeScore)
    {
        $this->homeScore = $homeScore;
    }

    public function getAwayScore()
    {
        return $this->awayScore;
    }

    public function setAwayScore($awayScore)
    {
        $this->awayScore = $awayScore;
    }

}