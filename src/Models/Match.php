<?php namespace Notflip\Ek\Models;

class Match {

    private $code;
    private $date;
    private $status;
    private $matchday;
    private $hometeam;
    private $awayteam;
    private $result;
    private $players;

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

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getPlayers()
    {
        return $this->players;
    }

    public function setPlayers($players)
    {
        $this->players = $players;
    }

}