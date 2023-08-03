<?php

$todoName = $_POST['todo_name'] ?? "";
$todoName = trim($todoName);

if ($todoName) {

    if (file_exists(__DIR__ . "/todo.json")) {
        $json = file_get_contents(__DIR__ . "/todo.json");
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }

    $jsonArray[$todoName] = ["completed" => false];

    file_put_contents(
        __DIR__ . "/todo.json",
        json_encode($jsonArray, JSON_PRETTY_PRINT)
    );
}

header("Location: index.php");