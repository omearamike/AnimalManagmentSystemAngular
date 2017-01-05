<?php
// include database and object files
include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../objects/animal.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$animal = new Animal($db);

// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of product to be edited
$animal->tag_id = $data->tag_id;
// $animal->breed_name = $data->breed_name
// read the details of product to be edited
$animal->readOne();

// create array
$animal_arr[] = array(
    "tag_id" =>  $animal->tag_id,
    "breed_name" => $animal->breed_name,
    "sex_type" => $animal->sex_type,
    "dob" => $animal->dob,
    "notes" => $animal->notes
);

// make it json format
print_r(json_encode($animal_arr));
// $data = json_encode($animal_arr);
// echo $data;
?>
