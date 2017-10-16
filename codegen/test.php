<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/src/Client.php';

$client = new \carono\docdoc\Client();
$client->login = 'partner.3051';
$client->password = 'CiWCZCBv';
$x = $client->nearestStationGeo(40, 40);
print_r($x);