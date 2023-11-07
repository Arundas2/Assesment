<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = 'ceymox123';
$database = 'test';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['username']) && !isset($_SESSION['is_admin']) && $_SESSION['is_admin'] !== true) {
    $faqRecords = array();

    $query = "SELECT question, answer FROM faq";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $faqRecords[] = $row;
        }
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FAQ Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        h2 {
            color: black;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #0077b6; 
            color: white; 
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        tr:nth-child(odd) {
            background-color: #ffffff; 
        }
    </style>
</head>
<body>
    <h2>FAQ Table</h2>
    <?php
    if (!empty($faqRecords)) {
        echo "<table>";
        echo "<tr><th>Question</th><th>Answer</th></tr>";
        foreach ($faqRecords as $faq) {
            echo "<tr><td>{$faq['question']}</td><td>{$faq['answer']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No FAQ records found.";
    }
    ?>
</body>
</html>
