<?php namespace Notflip\Ek\Collections;

abstract class Collection {

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