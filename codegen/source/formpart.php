<?php
$content = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'part.txt');

$data = [];
foreach (explode("\n", $content) as $num => $line) {
    if ($num == 0) {
        $data['name'] = $line;
        continue;
    }
}

print_r($data);