<?php namespace Notflip\Ek\Parsers;

use Notflip\Discount\Exceptions\JsonException;

class JsonParser {

    public function fetch($url)
    {
        $reqPrefs['http']['method'] = 'GET';
        $reqPrefs['http']['header'] = 'X-Auth-Token: 67220319fa2649779057398d73a9d5cc';
        $stream_context = stream_context_create($reqPrefs);
        $response = file_get_contents($url, false, $stream_context);
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
            throw new JsonException("JSON data corrupt: " . $error);
        }
        return $data;
    }
}