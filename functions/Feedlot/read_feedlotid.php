<?php
/**
  * @desc Returns all details of a single feedlot based on feedlot_id
*/

include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/feedlot.php';

$database = new Database();
$db = $database->getConnection();

$feedlot = new Feedlot($db);

$data = json_decode(file_get_contents("php://input")); // get tag_id of animal to be edited

if (!empty($data->feedlot_id)) {
    $feedlot->feedlot_id = $data->feedlot_id; // set tag_id property of animal to be edited //set the anima
 // do something



// read the details of product to be edited
$feedlot->readOne(); // Run the readOne() function in objects/animal.php

$feedlot_arr[] = array( // create array
    "feedlot_id" =>  $feedlot->feedlot_id,
    "feedlot_name" =>  $feedlot->feedlot_name,
    "custom" => "This is custom array value"
    // "feedlot_name" => $animal->breed_name
    // "feedlot_name" => $animal->breed_name
    // "sex_type" => $animal->sex_type,
    // "dob" => $animal->dob,
    // "notes" => $animal->notes
);
print_r(json_encode($feedlot_arr)); // return as json format

}



?>
