<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../objects/animal.php';
$database = new Database();
$db = $database->getConnection();
$animal = new Animal($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
$animal->tagId = $data->tagId;
$animal->breed_name = $data->breed_name;
$animal->dob = $data->dob;
$animal->sex = $data->sex;
$animal->notes = $data->notes;
// $animal->created = date('Y-m-d H:i:s');

// create the product
if($animal->create()){
    echo "Product was created.";
}

// if unable to create the product, tell the user
else{
    echo "Unable to create product.";
}
?>
