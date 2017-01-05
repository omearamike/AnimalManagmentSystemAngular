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

// set animal property values
$animal->tag_id = $data->tag_id;
$animal->breed_name = $data->breed_name;
$animal->sex_type = $data->sex_type;
$animal->dob = $data->dob;
$animal->notes = $data->notes;

// update the product
if($animal->update()){
    echo "Product was updated.";
}

// if unable to update the product, tell the user
else{
    echo "Unable to update product.";
}
?>
