<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/src/Client.php';

$client = new \carono\docdoc\Client();
$x = $client->nearestStationGeo(40, 40);
print_r($x);