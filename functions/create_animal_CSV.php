<?php

require_once __DIR__ . '/../config/database.php';
$database = new Database();
$db = $database->getConnection();

// instantiate product object
// include_once '/../objects/animal.php';
require_once __DIR__ . '/../objects/animal.php';
$animal = new Animal($db);
// get database connection
// include_once '/config/database.php';
// require_once __DIR__ . '/../config/database.php';
// $database = new Database();
// $db = $database->getConnection();
//
// // instantiate product object
// // include_once '/../objects/animal.php';
// require_once __DIR__ . '/../objects/animal.php';
// $animal = new Animal($db);
//
// // get posted data
// $data = json_decode(file_get_contents("php://input"));
//
// // set product property values
// $animal->tagId = $data->tagId;
// $animal->breed_id = $data->breed_id;
// $animal->dob = $data->dob;
// $animal->sex = $data->sex;
// $animal->notes = $data->notes;
// // $animal->created = date('Y-m-d H:i:s');
//
// // create the product
// if($animal->create()){
//     echo "Product was created.";
// }
//
// // if unable to create the product, tell the user
// else{
//     echo "Unable to create product.";
// }



//Open our CSV file using the fopen function.
$fh = fopen(__DIR__ . '/../tmp/data.csv', "r");
//Setup a PHP array to hold our CSV rows.
$csvData = array();
// echo json_encode($csvData);
//Loop through the rows in our CSV file and add them to
//the PHP array that we created above.
while (($row = fgetcsv($fh, 0, ",")) !== FALSE) {

    // $id = substr($row[0], 2);
    $animal->tagId = $row[0];
    $animal->sex = $row[1];
    $animal->dob = $row[2];
    $animal->breed_id = $row[3];

    // create the product
    if($animal->createUsingCsv()){
        echo "Product was created. $row[0] </br> ";
        // echo $id;
    }

    // if unable to create the product, tell the user
    else{
        echo "Unable to create product. $row[0] </br> ";
        // echo $id;
    }
}



//Finally, encode our array into a JSON string format so that we can print it out.
$result = json_encode($csvData);
// echo $result;

// $result = array();
// if (($handle = fopen(__DIR__ . '/../tmp/data.csv', "r")) !== FALSE) {
//     $column_headers = fgetcsv($handle); // read the row.
//     foreach($column_headers as $header) {
//             $result[$header] = array();
//     }
//
//     while (($data = fgetcsv($handle)) !== FALSE) {
//         $i = 0;
//         foreach($result as &$column) {
//
//                 $column[] = $data[$i++];
//         }
//
//     }
//     fclose($handle);
// }
// $json = json_encode($result);
// echo $json;
// echo $json['tag_id'];
?>
