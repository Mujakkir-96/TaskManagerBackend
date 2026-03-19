<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
header("Content-Type: application/json");
include("../db.php");

$data = json_decode(file_get_contents("php://input"));

$user_id = $data->user_id;
$title = $data->title;
$description = $data->description;
$deadline = $data->deadline;
$status = $data->status;

$sql = "INSERT INTO tasks (user_id, title, description, deadline, status)
        VALUES ('$user_id', '$title', '$description', '$deadline', '$status')";

if ($conn->query($sql)) {
    echo json_encode(["status" => "success", "message" => "Task added"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed"]);
}
?>