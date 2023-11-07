<?php
require_once 'Database.php';

class LoginHandler {
    private $dbConnection;

    public function __construct() {
        $this->dbConnection = new Database("localhost", "root", "ceymox123", "test");
    }

    public function validateLogin($username, $password) {
        $conn = $this->dbConnection->getConnection();

        $sql = "SELECT * FROM users WHERE username=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $stmt->close();
            $row = $result->fetch_assoc();
            $isadmin = $row['role'];
            $this->dbConnection->closeConnection();
            return $isadmin == 1;
        } else {
            $stmt->close();
            $this->dbConnection->closeConnection();
            return false;
        }
    }
}
?>
