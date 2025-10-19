<?php
header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__ . "/config/Database.php";

class Controller {
    private $conn;
    private $table_name;

    public function __construct($table_name){
        $database = new Database();
        $this->table_name = $table_name;
        $this->conn = $database->getConnection();
    }

    public function getAll(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    }

    public function get($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            echo json_encode($row);
        } else {
            http_response_code(404);
            echo json_encode(["message" => $this->table_name . " not found."]);
        }
    }

}
