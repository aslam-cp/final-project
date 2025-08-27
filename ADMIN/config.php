<?php
$servername = "localhost";
$username = "root"; // use your MySQL username
$password = "";     // your MySQL password (empty by default for XAMPP)
$dbname = "db_ksii";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
