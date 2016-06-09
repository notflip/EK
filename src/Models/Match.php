<?php namespace Notflip\Ek\Models;

class Match {

    private $homeCode;
    private $awayCode;
    private $date;
    private $status;
    private $matchday;
    private $homeTeam;
    private $awayTeam;
    private $homeScore;
    private $awayScore;
    private $homeFlag;
    private $awayFlag;
    private $bets;

    public function winner()
    {
        if($this->isPassed()) {
            if($this->getHomeScore() > $this->getAwayScore()) {
                return $this->getHomeTeam();
            } elseif($this->getHomeScore() == $this->getAwayScore()) {
                return 'equal';
            }
            return $this->getAwayTeam();
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

    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    public function setHomeTeam($hometeam)
    {
        $this->homeTeam = $hometeam;
    }

    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    public function setAwayTeam($awayteam)
    {
        $this->awayTeam = $awayteam;
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

    public function getHomeFlag()
    {
        return $this->homeFlag;
    }

    public function setHomeFlag($homeFlag)
    {
        $this->homeFlag = $homeFlag;
    }

    public function getAwayFlag()
    {
        return $this->awayFlag;
    }

    public function setAwayFlag($awayFlag)
    {
        $this->awayFlag = $awayFlag;
    }

    public function getBets()
    {
        return $this->bets;
    }

    public function setBets($bets)
    {
        $this->bets = $bets;
    }

    public function addBet($bet)
    {
        $this->bets[] = $bet;
    }

}