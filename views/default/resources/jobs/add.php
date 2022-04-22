<?php

$site_url = elgg_get_site_url();


$data = $decoder->decodeFile(__DIR__ .'/../../../../dropdown.json');

var_dump($data->job_types);