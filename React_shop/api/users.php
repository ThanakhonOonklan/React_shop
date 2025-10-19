<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json; charset=UTF-8");

    require_once __DIR__ . "/Controller.php";

    $table = "users";
    $ctrl = new Controller($table);

    $method = $_SERVER["REQUEST_METHOD"];
    $id = $_GET["id"] ?? null;
    
    switch ($method) {
        case "GET":
            if ($id && is_numeric($id)) {
                $ctrl->get($id);
            } else {
                $ctrl->getAll();
            }
            break;

        default:
            http_response_code(405);
            echo json_encode(["message" => "Method not allowed"]);
            break;
    }
?>

