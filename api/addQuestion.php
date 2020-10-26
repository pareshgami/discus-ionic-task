<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    require("Db.class.php");
    $db = new Db();

    $json = json_decode(file_get_contents('php://input'), true);
    $questionData = $json['question_data'];
    $userId = $json['user_id'];
    $insert = $db->query("INSERT INTO question(question_data, user_id) VALUES(:q,:u)",array("q" => json_encode($questionData), "u" => $userId));
    $result = array("status" => 200, 'message' => 'Question added.!');
    echo json_encode($result);
?>