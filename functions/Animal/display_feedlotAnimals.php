<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/animal.php';

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

$stmt = $animal->readAll(); // query all animals function in Objects/animal.php
$data = json_encode($stmt);
echo $data; // Return data as JSON
?>
