<?php namespace Notflip\Ek\Models;

class Match {

    private $homeCode;
    private $awayCode;
    private $date;
    private $status;
    private $matchday;
    private $hometeam;
    private $awayteam;
    private $homeScore;
    private $awayScore;
    private $bets;

    public function getWinner()
    {
        if($this->isPassed()) {
            if($this->getHomeScore() > $this->getAwayScore()) {
                return ["code" => $this->getHomeCode(), "name" => $this->getHometeam()];
            } elseif($this->getHomeScore() == $this->getAwayScore()) {
                return 'equal';
            }
            return ["code" => $this->getAwayCode(), "name" => $this->getAwayteam()];
        }

        return false;
    }

    public function isPassed()
    {
        return new \DateTime($this->getDate()) < new \DateTime();
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getMatchday()
    {
        return $this->matchday;
    }

    public function setMatchday($matchday)
    {
        $this->matchday = $matchday;
    }

    public function getHometeam()
    {
        return $this->hometeam;
    }

    public function setHometeam($hometeam)
    {
        $this->hometeam = $hometeam;
    }

    public function getAwayteam()
    {
        return $this->awayteam;
    }

    public function setAwayteam($awayteam)
    {
        $this->awayteam = $awayteam;
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

    public function getBets()
    {
        return $this->bets;
    }

    public function setBets($bets)
    {
        $this->bets = $bets;
    }

}