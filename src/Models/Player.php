<?php namespace Notflip\Ek\Models;

class Player {

    private $name;
    private $points;
    private $bets;
    private $topscorer;

    public function __construct()
    {
        $this->setPoints(0);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }

    public function addPoints($points)
    {
        $this->setPoints($this->getPoints() + $points);
    }

    public function getBets()
    {
        return $this->bets;
    }

    public function setBets($bets)
    {
        $this->bets = $bets;
    }

    public function getTopscorer()
    {
        return $this->topscorer;
    }

    public function setTopscorer($topscorer)
    {
        $this->topscorer = $topscorer;
    }

}