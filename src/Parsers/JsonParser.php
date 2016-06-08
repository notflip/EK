<?php namespace Notflip\Ek\Parsers;

use phpFastCache\CacheManager;

class JsonParser {

    public function fetch($url)
    {
        $cache = CacheManager::Files();

        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: 67220319fa2649779057398d73a9d5cc';
        $stream_context = stream_context_create($reqPrefs);

        $response = $cache->get($url);
        if(is_null($response)) {
            $response = file_get_contents($url, false, $stream_context);
            $cache->set($url, $response, 60);
        }

        $data = json_decode($response);

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $error = null;
                break;
            case JSON_ERROR_DEPTH:
                $error = 'The maximum stack depth has been exceeded.';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Invalid or malformed JSON.';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON.';
                break;
            case JSON_ERROR_UNSUPPORTED_TYPE:
                $error = 'A value of a type that cannot be encoded was given.';
                break;
            default:
                $error = 'Unknown JSON error occured.';
                break;
        }

        if($error) {
            throw new \Exception("JSON data corrupt: " . $error);
        }
        return $data;
    }
}