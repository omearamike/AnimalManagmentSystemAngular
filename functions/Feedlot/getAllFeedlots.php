<?php
/**
  * @desc Returns All feedlots in the database.
*/


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/feedlot.php';

$database = new Database();
$db = $database->getConnection();

$feedlot = new Feedlot($db);

$stmt = $feedlot->readAll(); // query all animals function in Objects/animal.php
$data = json_encode($stmt);
echo $data; // Return data as JSON
?>
