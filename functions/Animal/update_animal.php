<?php
// include database and object files
include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/animal.php';

$database = new Database(); // prepare database object
$db = $database->getConnection(); // get database connection

$animal = new Animal($db); // prepare animal object

$data = json_decode(file_get_contents("php://input")); // get tag_id of animal to be edited

// $animal->tag_id = $data->tag_id; // set ID property of product to be edited

// set animal property values
$animal->tag_id = $data->tag_id;
$animal->breed_name = $data->breed_name;
$animal->sex_type = $data->sex_type;
$animal->dob = $data->dob;
$animal->notes = $data->notes;

if($animal->update()){ // update the product
    echo "Animal was updated";
}

else{ // if unable to update the product, tell the user
    echo "Unable to update animal.";
}
?>
