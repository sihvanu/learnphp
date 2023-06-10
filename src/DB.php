<?php
namespace App;

use App\Models\Post;
use PDO;
use stdClass;

class DB {
    private $conn;
    public function __construct()
    {
        $this->conn = new PDO("sqlite:database.sqlite");
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function all($table, $class){
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function find($table, $class, $id){
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id=$id");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    public function where($table, $class, $field, $value) {
       
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE $field='$value'");
        
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function insert($table, $fields, $values){
        $fieldNamesLine = implode(', ', $fields);
        $valuesLine = implode("', '", $values);
        $sql = "INSERT INTO $table ($fieldNamesLine) VALUES ('$valuesLine')";
        // use exec() because no results are returned
        $this->conn->exec($sql);
    }


    public function update($table, $fields, $values, $id){
        $updateLine = '';
        foreach($fields as $key=>$field) {
            $value = $values[$key];
            $updateLine .= $field . "='$value'";
            if ($key !== array_key_last($fields)) {
                $updateLine .= ', ';
            }
        }
        $sql = "UPDATE $table SET $updateLine WHERE id=$id";
   
        // Prepare statement
        $stmt = $this->conn->prepare($sql);

        // execute the query
        $stmt->execute();
    }
    public function delete($table, $id){
        $sql = "DELETE FROM $table WHERE id=$id";

        // use exec() because no results are returned
        $this->conn->exec($sql);
    }
}