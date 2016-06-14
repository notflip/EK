<?php namespace Notflip\Ek\Collections;

class MatchCollection extends Collection {

    public function all()
    {
        return $this->items;
    }

    public function byClosest()
    {
        $items = $this->items;
        foreach($items as $match) {
            $intervals[] = (new \DateTime())->getTimestamp() - $match->getDate()->getTimestamp();
        }

        $return = [];
        foreach($intervals as $key => $interval) {
            if($key != 0) {
                if(($interval < $intervals[$key-1]) && ($interval > 0)) {
                    $return[0] = $interval;
                    $return[1] = $intervals[$key+1];
                }
                $return[] = $interval;
            }
        }

        // Get the closest number to zero but not below it
        var_dump($intervals);
        die();
        asort($interval);
        return key($interval);

    }
}