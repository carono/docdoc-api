<?php
include_once __DIR__ . '/source/formraw.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/AbstractClient.php';

$absClass = new \carono\docdoc\codegen\AbstractClient();
$raw = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '/source/raw.json'), true);
$absClass->renderToFile(['raw' => $raw]);