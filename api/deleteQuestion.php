<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    require("Db.class.php");
    $db = new Db();
    $json = json_decode(file_get_contents('php://input'), true);
    $qId = $json['question_id'];
    $delete = $db->query("DELETE FROM question WHERE id = :id",array("id"=> $qId));
    $result = array("status" => 200, 'message' => 'Question deleted.!');
    echo json_encode($result);
?>