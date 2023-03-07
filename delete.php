<?php

$file_name = 'todo.json';
$json = file_get_contents($file_name);
$jsonArray = json_decode($json, true);

$todo_name = htmlspecialchars($_POST['todo_name']);
unset($jsonArray[$todo_name]);

file_put_contents($file_name, json_encode($jsonArray, JSON_PRETTY_PRINT));
header('Location: index.php');