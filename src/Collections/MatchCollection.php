<?php namespace Notflip\Ek\Collections;

class MatchCollection extends Collection {

    public function all()
    {
        return $this->items;
    }

    public function byClosest()
    {
        $items = $this->items;
        $previous = null;

        foreach($items as $code => $match) {
            $timeago = (new \DateTime())->getTimestamp() - $match->getDate()->getTimestamp();
            if($timeago < 0) {
                moveUpInArray($items, makeMatchCode($previous));
                moveUpInArray($items, makeMatchCode($match));
                break;
            }
            $previous = $match;
        }

        return $items;
    }

}