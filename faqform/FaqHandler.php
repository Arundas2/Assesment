<?php
require_once 'Database.php';

class FaqHandler {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new Database("localhost", "root", "ceymox123", "test");
    }

    public function faqinsert($question, $answer){
        $conn = $this->dbConnection->getConnection();

        $insertSql = "INSERT INTO faq (question, answer) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);
    
        $insertStmt->bind_param("ss", $question, $answer);

        if ($insertStmt->execute()) {
            $insertStmt->close();
            $this->dbConnection->closeConnection();
            return true;
        } else {
            $insertStmt->close();
            $this->dbConnection->closeConnection();
            return false;
        }
    }
}
?>
