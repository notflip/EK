<?php namespace Notflip\Ek\Models;

class Player {

    private $name;
    private $homeCode;
    private $awayCode;
    private $homeScore;
    private $awayScore;

    public function getPoints($homeScore, $awayScore)
    {
        // if the player's score is equal to the output score
        if(($homeScore == $this->homeScore) && ($awayScore == $this->awayScore)) {
            return "<span class=\"label label-success\"><i class=\"glyphicon glyphicon-star\"></i> 3</span>";
        }

        // if both scores are equal to each other and equal to one another
        if(($homeScore == $awayScore) && ($this->homeScore == $this->awayScore)) {
            return "<span class=\"label label-success\"><i class=\"glyphicon glyphicon-star\"></i> 1</span>";
        }

        if($homeScore < $awayScore && $this->homeScore < $this->awayScore) {
            return "<span class=\"label label-success\"><i class=\"glyphicon glyphicon-star\"></i> 1</span>";
        }

        return false;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getHomeCode()
    {
        return $this->homeCode;
    }

    public function setHomeCode($homeCode)
    {
        $this->homeCode = $homeCode;
    }

    public function getAwayCode()
    {
        return $this->awayCode;
    }

    public function setAwayCode($awayCode)
    {
        $this->awayCode = $awayCode;
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