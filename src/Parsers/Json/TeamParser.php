<?php namespace Notflip\Ek\Parsers\Json;

use Notflip\Ek\Models\Team;
use Notflip\Ek\Parsers\JsonParser;

class TeamParser extends JsonParser {

    public function parse($url)
    {
        $data = $this->fetch($url)->teams;

        $items = [];
        foreach ($data as $item) {
            $team = new Team();
            $team->setCode($item->code);
            $team->setName($item->name);
            $team->setFlag($item->crestUrl);
            $items[] = $team;
        }

        if(empty($items)) {
            throw new \Exception("No teams found");
        }
        return $items;
    }
}