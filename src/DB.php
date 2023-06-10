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

    public function insert($table, $fields, $values){
        $fieldNamesLine = implode(', ', $fields);
        $valuesLine = implode("', '", $values);
        $sql = "INSERT INTO $table ($fieldNamesLine) VALUES ('$valuesLine')";
        // use exec() because no results are returned
        $this->conn->exec($sql);
    }
}