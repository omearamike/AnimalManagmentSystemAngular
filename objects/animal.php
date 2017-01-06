<?php

/**
  * @desc This controller will be used to display animal records
  * @function: __construct(), create(), readAll(), createUsingCsv(), readOne(), update().
  * @param $scope: is the scope used to bring data which is with in the animalCtrl Controller scope from client(website)
  * @param $http: Used to create a http request to server
*/

class Animal    {

    // use \PDO;
    private $conn;
    private $table_name = "animal";
    public $breed_id;
    public $dob;
    public $sex;
    public $notes;

    public function __construct($db){ // constructor with $db as database connection
        $this->conn = $db;
    }

    function create(){
        // query to insert record
        $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes)
        VALUES (:tagId,
        (SELECT breed_id FROM breed WHERE breed_name = :breed_name),
        STR_TO_DATE(:dob, '%Y-%m-%d'),
        (SELECT sex_id FROM sex WHERE sex_type = :sex),
        :notes)";

        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(':tagId', $this->tagId, PDO::PARAM_STR);
        $stmt->bindParam(":breed_name", $this->breed_name, PDO::PARAM_INT);
        $stmt->bindParam(":dob", $this->dob, PDO::PARAM_STR);
        $stmt->bindParam(":sex", $this->sex, PDO::PARAM_INT);
        $stmt->bindParam(":notes", $this->notes, PDO::PARAM_STR);

        if($stmt->execute()){ // execute query
            print_r("data inserted");
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";

            return false;
        }
    }

    function readAll(){ // read all animals

        $query = "SELECT a.tag_id as tag_id, b.breed_name as breed_name, a.dob as dob, DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%y' )
        AS year, DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%m') - 1
        AS month, DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%d' )
        AS days, s.sex_type as sex_type, a.notes as notes FROM animal a
        JOIN breed b on a.breed_id = b.breed_id
        JOIN sex s on a.sex = s.sex_id
        ORDER BY `a`.`dob` ASC";

        $stmt = $this->conn->prepare($query); // prepare query statement

        $stmt->execute(); // execute query

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all values
    }

    // @requires: values to be passed from functions/Animal/create_animal_CSV.php
    function createUsingCsv(){

        // Add NEW breeds to breed table if they do not exist
        $addBreeds = "INSERT INTO breed (breed_name) VALUES (:breed_name) ON DUPLICATE KEY UPDATE `breed_name` = :breed_name";

        $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes)
        VALUES (:tagId, (SELECT breed_id FROM breed WHERE breed_name = :breed_name), :dob, (SELECT sex_id FROM sex WHERE sex_type = :sex), null)";

        // Execute add breeds query
        $stmt1 = $this->conn->prepare( $addBreeds );
        $stmt1->bindParam(":breed_name", $this->breed_name, PDO::PARAM_INT);
        $stmt1->execute();

        // Prepare main query
        $stmt = $this->conn->prepare( $query );

        // Alter date from CSV from "dd/mm/yyyy" TO "yyyy-mm-dd"
        $originalDate = str_replace("/","-", $this->dob);
        $newDate = date("Y-m-d", strtotime($originalDate));

        // Remove "IE" from Tag ID
        $tagId = substr($this->tagId, 2);

        // Bind values to insert to database
        $stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);
        $stmt->bindParam(":sex", $this->sex, PDO::PARAM_INT); // $this-> ? is passed in from create_animal_CSV.php
        $stmt->bindParam(":breed_name", $this->breed_name, PDO::PARAM_INT);
        $stmt->bindParam(":dob", $newDate, PDO::PARAM_STR);

        if($stmt->execute()){ // execute query
            print_r("Record inserted: $this->tagId ");
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }
    }


    function readOne(){ // used when filling up the update product form

         $query = "SELECT a.tag_id AS tag_id, b.breed_name AS breed_name, a.dob AS dob,
         DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%y' ) AS year,
         DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%m')  AS month,
         DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%d' ) AS days,
         s.sex_type AS sex_type, a.notes AS notes
         FROM animal a JOIN breed b ON a.breed_id = b.breed_id JOIN sex s ON a.sex = s.sex_id
         WHERE tag_id = :tag_id";

        $stmt = $this->conn->prepare( $query );  // prepare query statement

        $stmt->bindParam(":tag_id", $this->tag_id, PDO::PARAM_INT); // bind tag_id of product to be updated

        $stmt->execute(); // execute query

        $row = $stmt->fetch(PDO::FETCH_ASSOC); // get retrieved row

        // set values to object properties
        $this->tag_id = $row['tag_id'];
        $this->breed_name = $row['breed_name'];
        $this->sex_type = $row['sex_type'];
        $tmpDob = $row['dob'];
        $tmpDob = str_replace("/","-", $tmpDob);
        $this->dob = date("Y-m-d", strtotime($tmpDob));
        $this->notes = $row['notes'];
    }

    function update(){ // update the product

        $query = "UPDATE animal SET breed_id = (SELECT breed_id FROM breed WHERE breed_name = :breed_name),
                  dob = :dob,
                  sex = (SELECT sex_id FROM sex WHERE sex_type = :sex_type),
                  notes = :notes
                  WHERE tag_id = :tag_id";

        $stmt = $this->conn->prepare($query); // prepare query statement

        $stmt->bindParam(":tag_id", $this->tag_id, PDO::PARAM_INT);
        $stmt->bindParam(":breed_name", $this->breed_name, PDO::PARAM_INT);
        $stmt->bindParam(":sex_type", $this->sex_type, PDO::PARAM_INT);
        $stmt->bindParam(":dob", $this->dob, PDO::PARAM_STR);
        $stmt->bindParam(":notes", $this->notes, PDO::PARAM_STR);

        if($stmt->execute()){ // execute the query
            return true;
        }else{
            return false;
        }
        }
    };
?>
