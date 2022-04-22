<?php

use Webmozart\Json\JsonDecoder;
$site_url = elgg_get_site_url();

$decoder = new JsonDecoder();


$data = $decoder->decodeFile(__DIR__ .'/../../../../dropdown.json');

var_dump($data->job_types);