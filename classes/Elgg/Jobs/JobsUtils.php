<?php

namespace Elgg\Legislations;
use Webmozart\Json\JsonDecoder;

class JobsUtils{

    public function decodeJsonFile($filename){
        $decoder = new JsonDecoder();
        $data = $decoder->decodeFile(__DIR__ .'/../../../' . $filename);
    }

}