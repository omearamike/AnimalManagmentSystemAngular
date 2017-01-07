<?php
    class Feedlot {

        // use \PDO;
        private $conn;

        public function __construct($db){ // constructor with $db as database connection
            $this->conn = $db;
        }

        function create(){
            // query to insert record
            $query = "INSERT INTO feedlot (name_feedlot)
            VALUES (:feedlot_name)";

            $stmt = $this->conn->prepare($query);

            // bind values
            $stmt->bindParam(':feedlot_name', $this->name, PDO::PARAM_STR);

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

        function readAll(){ // read all feedlots

            $query = "SELECT lot_id, name_feedlot FROM feedlot";

            $stmt = $this->conn->prepare($query); // prepare query statement

            $stmt->execute(); // execute query

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all values
        }

        function readOne(){ // used when filling up the update product form

             $query = "SELECT lot_id, name_feedlot FROM feedlot WHERE lot_id = 13";

            $stmt = $this->conn->prepare( $query );  // prepare query statement

            // $stmt->bindParam(":tag_id", $this->tag_id, PDO::PARAM_INT); // bind tag_id of product to be updated

            $stmt->execute(); // execute query

            $row = $stmt->fetch(PDO::FETCH_ASSOC); // get retrieved row

            // set values to object properties
            $this->lot_id = $row['lot_id'];
            $this->feedlot_name = $row['name_feedlot'];
            // $this->sex_type = $row['sex_type'];
            // $tmpDob = $row['dob'];
            // $tmpDob = str_replace("/","-", $tmpDob);
            // $this->dob = date("Y-m-d", strtotime($tmpDob));
            // $this->notes = $row['notes'];
        }








    }
 ?>
