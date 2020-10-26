<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    require("Db.class.php");
    $db = new Db();

    $json = json_decode(file_get_contents('php://input'), true);
    $email = $json['email'];
    $pwd = $json['pwd'];
    $person = $db->query("SELECT id, email FROM users WHERE email = :email AND pwd = :pwd", array("email"=> $email, "pwd"=> $pwd));

    if (count($person) === 0) {
        $result = array("status" => 404, 'message' => 'Wrong email or password.');
        echo json_encode($result);
    } else {
        $result = array("status" => 200, 'message' => 'Logged in successfully.!', 'data' => $person[0]);
        echo json_encode($result);
    }
?>