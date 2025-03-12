<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$counterFile = 'counter.txt';

if (!file_exists($counterFile)) {
    file_put_contents($counterFile, '0');
}

$count = (int)file_get_contents($counterFile);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Увеличиваем счетчик
    $count++;
    file_put_contents($counterFile, (string)$count);
} 

echo json_encode(['views' => $count]);
?> 