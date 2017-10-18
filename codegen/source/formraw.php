<?php

$rawFile = __DIR__ . DIRECTORY_SEPARATOR . 'raw.csv';
$data = [];
if (($handle = fopen($rawFile, "r")) !== FALSE) {
    $name = '';
    $url = '';
    $startResponse = false;
    $progressResponse = false;
    $startRequest = false;
    $startUrl = false;
    $i = -1;
    while (($arr = fgetcsv($handle, 1000, ";")) !== FALSE) {
        if (!array_filter($arr)) {
            continue;
        }
        if (strpos($arr[0], 'exit') !== false) {
            break;
        }
        if (mb_strpos($arr[0], 'Получение', 0, 'utf-8') !== false && count($arr) == 5) {
            $startRequest = true;
            $i++;
            continue;
        }
        if (mb_strpos($arr[0], 'Результат запроса', 0, 'utf-8') !== false) {
            $startResponse = true;
            $startRequest = false;
            continue;
        }

        if (strpos($arr[0], 'URL:') !== false) {
            $startUrl = true;
            $url = trim(substr($arr[0], 5));
            if (strpos($url, 'api/rest/1.0.6/json') !== false) {
                $url = substr($url, 20);
            }
            continue;
        }
        if ($startUrl && hasStr($arr[0], ['Пример запроса:', 'Входные параметры'])) {
            $data[$i]['request']['url'] = $url;
            $urls[] = $data[$i]['request']['url'];
            $startUrl = false;
            continue;
        }
        if ($startUrl) {
            $url .= $arr[0];
        }
        if (preg_match('/^[a-zA-Z\$]+$/', trim($arr[0]))) {
            if ($startRequest) {
                $data[$i]['request']['params'][] = [
                    'name' => trim(ltrim($arr[0], '$')),
                    'type' => trim($arr[1]),
                    'description' => trim(@$arr[2]),
                    'require' => trim(@$arr[3]),
                    'get' => trim(@$arr[4])
                ];
            }elseif ($startResponse) {
                $data[$i]['response']['params'][] = [
                    'name' => trim($arr[0]),
                    'type' => trim($arr[1]),
                    'description' => trim($arr[2])
                ];
            }
        }
    }
    fclose($handle);
}


file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'raw.json', json_encode($data));

function hasStr($str, array $texts)
{
    foreach ($texts as $text) {
        if (mb_strpos($text, $str, 0, 'utf-8') !== false) {
            return true;
        }
    }
    return false;
}