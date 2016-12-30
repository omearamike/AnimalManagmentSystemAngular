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
        $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes, breedbreed_id) VALUES (:tagId, (SELECT breed_id FROM breed WHERE breed_name = :breed_id), STR_TO_DATE(:dob, '%Y-%m-%d'), (SELECT sex_id FROM sex WHERE sex_type = :sex), :notes, null)";

        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(':tagId', $this->tagId, PDO::PARAM_INT);
        $stmt->bindParam(":breed_id", $this->breed_id, PDO::PARAM_INT);
        $stmt->bindParam(":dob", $this->dob, PDO::PARAM_STR);
        $stmt->bindParam(":sex", $this->sex, PDO::PARAM_INT);
        $stmt->bindParam(":notes", $this->notes, PDO::PARAM_STR);

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
