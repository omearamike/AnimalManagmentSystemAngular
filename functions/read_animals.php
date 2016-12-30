<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// // include database and object files
include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../objects/animal.php';
// require_once __DIR__ . '/../config/database.php';
// require_once __DIR__ . '/../objects/animal.php';
//
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$animal = new Animal($db);

// query products
$stmt = $animal->readAll();
$data = json_encode($stmt);
echo $data;
?>
