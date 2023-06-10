<?php

namespace App\Controllers;

use PDO;
use PDOException;

class PublicController {
    public function index() {
        try {
            $conn = new PDO("sqlite:database.sqlite");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT * FROM posts");
            $stmt->execute();

            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            dump($result);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          die;
        $name = 'Anu';
        view('index', compact('name'));
    }

    public function about() {
        view('about');
    }
}