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

            $query = "SELECT name_feedlot FROM feedlot";

            $stmt = $this->conn->prepare($query); // prepare query statement

            $stmt->execute(); // execute query

            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all values
        }








    }
 ?>
