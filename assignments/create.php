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
$subject = $data->subject;
$title = $data->title;
$due_date = $data->due_date;

$sql = "INSERT INTO assignments (user_id, subject, title, due_date, status)
        VALUES ('$user_id', '$subject', '$title', '$due_date', 'Pending')";

if ($conn->query($sql)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>