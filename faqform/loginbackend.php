<?php
session_start();
require_once 'LoginHandler.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $loginHandler = new LoginHandler();

    if ($loginHandler->validateLogin($username, $password)) {
        $_SESSION['username'] = $username;
        $response = array("status" => "admin", "message" => "admin");
    } else {
        $response = array("status" => "notadmin", "message" => "Not admin");
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
