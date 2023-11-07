<?php
session_start();
require_once 'FaqHandler.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST["question"];
    $answer = $_POST["answer"];

    $faqHandler = new FaqHandler();

    if ($faqHandler->faqinsert($question, $answer)) {
        
        $response = array("status" => "success", "message" => "success");
    } else {
        $response = array("status" => "error", "message" => "error");
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
