<?php
class Animal{
    // database connection and table name
    // use \PDO;
    private $conn;
    private $table_name = "animal";

    // object properties
    public $tagId;
    public $breed_id;
    public $dob;
    public $sex;
    public $notes;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    function create(){

        // query to insert record
        // $query = "INSERT INTO " . $this->table_name . "SET tagId=:tagId, breed_id=:breed_id, dob=:dob, sex=:sex, notes=:notes";
        // $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes, breedbreed_id) VALUES (:tagId, :breed_id, STR_TO_DATE(:dob, '%Y-%m-%d'), :sex, :notes, null"
        // $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes, breedbreed_id) VALUES (123999, 1, STR_TO_DATE('2013-11-11', '%Y-%m-%d'), 1, 'kdsfk', null)";
        $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes, breedbreed_id) VALUES (123589633, null, null, null, null, null)";

        $stmt = $this->conn->prepare($query);

        // posted values
        $this->tagId=htmlspecialchars(strip_tags($this->tagId));
        $this->breed_id=htmlspecialchars(strip_tags($this->breed_id));
        $this->dob=htmlspecialchars(strip_tags($this->dob));
        $this->sex=htmlspecialchars(strip_tags($this->sex));
        $this->notes=htmlspecialchars(strip_tags($this->notes));
                // $myVar = $statement->bindParam(':tagId', $this->request->tagId, PDO::PARAM_INT);
        // bind values
        $stmt->bindParam(':tagId', $this->request->tagId);
        $stmt->bindParam(":breed_id", $this->breed_id);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":sex", $this->sex);
        $stmt->bindParam(":notes", $this->notes);
        // $stmt->execute();
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";

            return false;
        }

    }
}
?>
