<?php

include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../objects/animal.php';

$database = new Database();
$db = $database->getConnection();

$animal = new Animal($db);

$fh = fopen(__DIR__ . '/../tmp/data.csv', "r"); //Open our CSV file using the fopen function.
$csvData = array(); //Setup a PHP array to hold our CSV rows.

//Loop through the rows in our CSV file and add them to the PHP array that we created above.
while (($row = fgetcsv($fh, 0, ",")) !== FALSE) {

    $animal->tagId = $row[0];
    $animal->sex = $row[1];
    $animal->dob = $row[2];
    $animal->breed_name = $row[3];


    if($animal->createUsingCsv()){ // create the product
        echo "Product was created. $row[0] </br> ";
    }
    else{ // if unable to create the product, tell the user
        echo "Unable to create product. $row[0] </br> ";
    }
}

$result = json_encode($csvData); //Finally, encode our array into a JSON string format so that we can print it out.

?>
