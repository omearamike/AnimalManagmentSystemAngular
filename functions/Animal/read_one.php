<?php

include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/animal.php';

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

$data = json_decode(file_get_contents("php://input")); // get tag_id of animal to be edited

$animal->tag_id = $data->tag_id; // set tag_id property of animal to be edited //set the animal

// read the details of product to be edited
$animal->readOne(); // Run the readOne() function in objects/animal.php

$animal_arr[] = array( // create array
    "tag_id" =>  $animal->tag_id,
    "breed_name" => $animal->breed_name,
    "sex_type" => $animal->sex_type,
    "dob" => $animal->dob,
    "notes" => $animal->notes
);

print_r(json_encode($animal_arr)); // return as json format

?>
