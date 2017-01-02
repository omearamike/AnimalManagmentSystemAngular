<?php
class Animal{
    // database connection and table name
    // use \PDO;
    private $conn;
    private $table_name = "animal";

    // object properties
    // public $tagId;
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
        $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes) VALUES (:tagId, (SELECT breed_id FROM breed WHERE breed_name = :breed_id), STR_TO_DATE(:dob, '%Y-%m-%d'), (SELECT sex_id FROM sex WHERE sex_type = :sex), :notes)";
        // $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes, breedbreed_id) VALUES (:tagId, (SELECT breed_id FROM breed WHERE breed_name = :breed_id), STR_TO_DATE(:dob, '%Y-%m-%d'), (SELECT sex_id FROM sex WHERE sex_type = :sex), :notes, null)";

        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(':tagId', $this->tagId, PDO::PARAM_STR);
        $stmt->bindParam(":breed_id", $this->breed_id, PDO::PARAM_INT);
        $stmt->bindParam(":dob", $this->dob, PDO::PARAM_STR);
        $stmt->bindParam(":sex", $this->sex, PDO::PARAM_INT);
        $stmt->bindParam(":notes", $this->notes, PDO::PARAM_STR);

        // execute query
        if($stmt->execute()){
            print_r("data inserted");
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
            echo "</pre>";

            return false;
        }
    }

    // read all animals
    function readAll(){

        $query = "SELECT a.tag_id as tag_id, b.breed_name as breed_name, a.dob as dob, DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%y' ) * 12 AS year,
        DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%m') AS month,
        DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%d' ) AS days,
        s.sex_type as sex_name, a.notes as notes FROM animal a
        join breed b on a.breed_id = b.breed_id
        join sex s on a.sex = s.sex_id order by a.tag_id";
        // $query = "SELECT a.tag_id as tag_id, b.breed_name as breed_name, a.dob as dob, DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%y' ) * 12 AS year,
        // DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%m') AS month,
        // DATE_FORMAT( FROM_DAYS( DATEDIFF(CURRENT_DATE, dob) ), '%d' ) AS days,
        // s.sex_type as sex_name, a.notes as notes FROM animal a
        // join breed b on a.breed_id = b.breed_id
        // join sex s on a.sex = s.sex_id order by a.tag_id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function createUsingCsv(){

        $addBreeds = "INSERT INTO breed (breed_name) VALUES (:breed_id) ON DUPLICATE KEY UPDATE `breed_name` = :breed_id";

        $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes) VALUES (:tagId, (SELECT breed_id FROM breed WHERE breed_name = :breed_id), :dob, (SELECT sex_id FROM sex WHERE sex_type = :sex), null)";
        // $stmt = $this->conn->prepare( $query );
        // $breed_id = :breed_id;
        $stmt1 = $this->conn->prepare( $addBreeds );
        $stmt1->bindParam(":breed_id", $this->breed_id, PDO::PARAM_INT);
        $stmt1->execute();
        $stmt = $this->conn->prepare( $query );

        // echo substr($this->tagId, 2);
        // $id = substr($this->tagId, 2);
        // bind values
        // $tagId = 234324111;
        // echo "this test";
        // echo $this->tagId;
        // echo $query;
        $originalDate = str_replace("/","-", $this->dob);
        $newDate = date("Y-m-d", strtotime($originalDate));
        // echo $newDate;
        // echo $id;
        $tagId = substr($this->tagId, 2);
        $stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);
        $stmt->bindParam(":sex", $this->sex, PDO::PARAM_INT);
        $stmt->bindParam(":breed_id", $this->breed_id, PDO::PARAM_INT);

        $stmt->bindParam(":dob", $newDate, PDO::PARAM_STR);
        // execute query
        if($stmt->execute()){
            print_r("Record inserted: $this->tagId ");
            return true;
        }else{
            echo "<pre>";
                print_r($stmt->errorInfo());
                // echo $this->tagId;
            echo "</pre>";
            return false;
        }
      }

    // function createUsingCsv(){
    //   // $id = $this->tagId;
    //     // query to insert record
    //     // $addBreeds = "INSERT INTO breed (breed_name) VALUES ($this->breed_id)";
    //     $query = "INSERT INTO animal (tag_id, breed_id, dob, sex, notes) VALUES ('1325', (SELECT breed_id FROM breed WHERE breed_name = :breed_id), :dob, (SELECT sex_id FROM sex WHERE sex_type = :sex), null)";
    //
    //     $stmt = $this->conn->prepare($query);
    //
    //     $originalDate = str_replace("/","-", $this->dob);
    //     $newDate = date("Y-m-d", strtotime($originalDate));
    //     // echo $newDate;
    //     // echo $id;
    //     echo substr($this->tagId, 2);
    //     $stmt->bindParam(':tagId', substr($this->tagId, 2), PDO::PARAM_INT);
    //     $stmt->bindParam(":sex", $this->sex, PDO::PARAM_INT);
    //     $stmt->bindParam(":breed_id", $this->breed_id, PDO::PARAM_INT);
    //     $stmt->bindParam(":dob", $newDate, PDO::PARAM_STR);
    //
    //
    //     // execute query
    //     if($stmt->execute()){
    //         print_r("Record inserted: $this->tagId ");
    //         return true;
    //     }else{
    //         echo "<pre>";
    //             print_r($stmt->errorInfo());
    //             // echo $this->tagId;
    //         echo "</pre>";
    //
    //         return false;
    //     }
    // }
}
?>
