<?php
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