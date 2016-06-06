<?php namespace Notflip\Ek\Collections;

class MatchCollection extends Collection {

    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function all()
    {
        return $this->items;

    }

}