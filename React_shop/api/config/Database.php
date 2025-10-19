<?php
class Database {
    private $host = "localhost";
    private $db_name = "shop_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function __construct(){
        $this->conn = null;
        try {
            $this->conn = new PDO(
              "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
              $this->username,
              $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET NAMES utf8mb4");
        } catch(PDOException $exception){
            http_response_code(500);
            echo json_encode(["message" => "Connection error: " . $exception->getMessage()]);
            exit;
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}
