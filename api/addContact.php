<?php
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    require("Db.class.php");
    $db = new Db();

    $json = json_decode(file_get_contents('php://input'), true);
    
    $contact_type = $json['contact_type'];
    $first_name = $json['first_name'];
    $last_name = $json['last_name'];
    $email = $json['email'];
    $mobile = $json['mobile'];
    $user_id = $json['user_id'];
    
    $insert = $db->query("INSERT INTO contacts
        (contact_type, first_name, last_name, email, mobile, user_id)
        VALUES
        (:ct, :fl, :ln, :email, :mobile, :user)",
        array(
            "ct" => $contact_type,
            "fl" => $first_name,
            "ln" => $last_name,
            "mobile" => $mobile,
            "email" => $email,
            "user" => $user_id
        ));

    $result = array("status" => 200, 'message' => 'Contact added.!');
    echo json_encode($result);
?>