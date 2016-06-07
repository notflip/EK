<?php namespace Notflip\Ek\Collections;

abstract class Collection {

    protected $items;

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function all()
    {
        return $this->items;
    }

    public function has($name)
    {
        return isset($items[$name]);
    }

    public function find($name)
    {
        return isset($this->items[$name]) ? $this->items[$name] : null;
    }

    public function add($name, $item)
    {
        $this->items[$name] = $item;
    }
}