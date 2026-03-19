<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
$conn = new mysqli("localhost", "root", "", "student_manager");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>