<?php
$content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'raw.txt');
$data = [];
$name = '';
$startResponse = false;
$progressResponse = false;
$i = -1;
foreach (explode("\n", $content) as $num => $line) {
    if (!$line) {
        continue;
    }
    if (strpos($line, 'exit') !== false) {
        break;
    }
    if (mb_strpos($line, 'Получение', 0, 'utf-8') !== false) {
        $i++;
        continue;
    }
    if (mb_strpos($line, 'Результат запроса', 0, 'utf-8') !== false) {
        $startResponse = true;
        continue;
    }

    if (strpos($line, 'URL:') !== false) {
        $data[$i]['request']['url'] = trim(substr($line, 5));
    }

    $arr = explode("\t", $line);
    if (count($arr) >= 3 && preg_match('/[a-zA-Z\$]/', $arr[0])) {
        if (!$startResponse) {
            $data[$i]['request']['params'][] = [
                'name' => trim(ltrim($arr[0], '$')),
                'type' => trim($arr[1]),
                'description' => trim(@$arr[2]),
                'require' => trim(@$arr[3]),
                'get' => trim(@$arr[4])
            ];
        } else {
            $progressResponse = true;
            $data[$i]['response']['params'][] = [
                'name' => trim($arr[0]),
                'type' => trim($arr[1]),
                'description' => trim($arr[2])
            ];
        }
    } elseif ($startResponse && $progressResponse) {
        $startResponse = $progressResponse = false;
    }
}
file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'raw.json', json_encode($data));