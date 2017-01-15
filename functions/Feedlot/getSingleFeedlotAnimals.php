<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/feedlot.php';
$database = new Database();
$db = $database->getConnection();
$feedlot = new Feedlot($db);
$data = json_decode(file_get_contents("php://input")); // get tag_id of animal to be edited
$feedlot->feedlot_id = $data->feedlot_id; // set tag_id property of animal to be edited //set the anima
// if (!empty($data->feedlot_id)) {
//     $feedlot->feedlot_id = $data->feedlot_id; // set tag_id property of animal to be edited //set the anima
$stmt = $feedlot->getSingleFeedlotAnimals(); // query all animals function in Objects/animal.php
$data = json_encode($stmt);
echo $data; // Return data as JSON
// }
?>
