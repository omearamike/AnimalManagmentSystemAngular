<?php
/**
  * @desc Creates a new Feedlot
*/

include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/feedlot.php';

$database = new Database();
$db = $database->getConnection();

$feedlot = new Feedlot($db);

$data = json_decode(file_get_contents("php://input")); // get posted data

// set product property values
$feedlot->name = $data->name;

if($feedlot->create()){ // create the animal
    echo "Product was created.";
}

else{ // if unable to create the animal, tell the user
    echo "Unable to create product.";
}
?>
