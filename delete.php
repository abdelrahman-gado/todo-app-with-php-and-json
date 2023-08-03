<?php

$todoName = $_POST['todo_name'] ?? false;

if ($todoName === false) {
    echo "Todo Not Found";
    exit;
}

if (!file_exists(__DIR__ . "/todo.json")) {
    echo "No stored to todos to delete";
    exit;
}


$json = file_get_contents(__DIR__ . "/todo.json");
$jsonArray = json_decode($json, true);

unset($jsonArray[$todoName]);

file_put_contents(__DIR__ . "/todo.json", json_encode($jsonArray, JSON_PRETTY_PRINT));

header("Location: index.php");