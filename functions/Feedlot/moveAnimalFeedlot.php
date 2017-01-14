<?php

include_once __DIR__ . '/../../config/database.php';
include_once __DIR__ . '/../../objects/feedlot.php';

$database = new Database();
$db = $database->getConnection();

$feedlot = new Feedlot($db);

$data = json_decode(file_get_contents("php://input")); // get posted data

// if (!empty($data)) {
// set product property values
$feedlot->lot_id = $data->lot_id;
$feedlot->tag_id = $data->tag_id;
// }
if($feedlot->moveAnimal()){ // create the animal
    echo "Animal was moved";
}

else{ // if unable to create the animal, tell the user
    echo "Unable to move Animal.";
}
?>
