<?php
    require("Db.class.php");
    $db = new Db();
    $qId = $_REQUEST['question_id'];
    $delete = $db->query("DELETE FROM question WHERE id = :id",array("id"=> $qId));
    $result = array("status" => 200, 'message' => 'Question deleted.!');
    echo json_encode($result);
?>