<?php
header("Content-Type: application/json");
include("../db.php");

$user_id = $_GET['user_id'];

$result = $conn->query("SELECT * FROM tasks WHERE user_id='$user_id'");

$tasks = [];

while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode($tasks);
?>