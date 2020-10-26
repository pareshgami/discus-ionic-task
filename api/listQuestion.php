<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    require("Db.class.php");
    $db = new Db();

    $json = json_decode(file_get_contents('php://input'), true);
    $userId = $json['user_id'];
    $questions = $db->query("SELECT * from question where user_id=:user_id", array("user_id" => $userId));
    $result = array("status" => 200, 'message' => 'OK', 'data' => $questions);
    echo json_encode($result);
?>