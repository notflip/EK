<?php namespace Notflip\Ek\Models;

class Team {

    private $code;
    private $name;
    private $flag;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getFlag()
    {
        return $this->flag;
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

}