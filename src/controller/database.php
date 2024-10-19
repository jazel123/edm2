<?php
class database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "user_auth";

    public function initDatabase(){
        try {
            $con = new PDO("mysql:host=$this->host;dbname=".$this->dbname, 
            $this->user, 
            $this->pass);
            // set the PDO error mode to exception
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $th) {
            echo $th;
            return null;
        }
    }

    public function createTableIfNotExists() {
        try {
            $con = $this->initDatabase();
            if ($con) {
                $sql = "CREATE TABLE IF NOT EXISTS user (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    role ENUM('user', 'admin') DEFAULT 'user'
                )";
                $con->exec($sql);
            }
        } catch(PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => "Error creating table: " . $e->getMessage()]);
        }
    }
}
