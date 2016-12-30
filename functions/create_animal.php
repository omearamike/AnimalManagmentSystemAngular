<?php
// get database connection
// include_once '/config/database.php';
require_once __DIR__ . '/../config/database.php';
$database = new Database();
$db = $database->getConnection();

// instantiate product object
// include_once '/../objects/animal.php';
require_once __DIR__ . '/../objects/animal.php';
$animal = new Animal($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// echo $data;
echo "the create_animalphp file";
// set product property values
$animal->tagId = $data->tagId;
$animal->breed_id = $data->breed_id;
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
