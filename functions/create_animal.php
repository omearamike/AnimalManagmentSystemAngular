<?php

include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../objects/animal.php';

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

$data = json_decode(file_get_contents("php://input")); // get posted data

// set product property values
$animal->tagId = $data->tagId;
$animal->breed_name = $data->breed_name;
$animal->dob = $data->dob;
$animal->sex = $data->sex;
$animal->notes = $data->notes;

if($animal->create()){ // create the animal
    echo "Product was created.";
}

else{ // if unable to create the animal, tell the user
    echo "Unable to create product.";
}
?>
