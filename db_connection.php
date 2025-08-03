<?php
$host = 'localhost';
$dbname = 'employee_record';
$username = 'root';
$password = ''; 

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>