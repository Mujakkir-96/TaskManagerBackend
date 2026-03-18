<?php
header("Content-Type: application/json");
include("../db.php");

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$title = $data->title;
$description = $data->description;
$deadline = $data->deadline;
$status = $data->status;

$sql = "UPDATE tasks 
        SET title='$title', description='$description', deadline='$deadline', status='$status'
        WHERE id='$id'";

if ($conn->query($sql)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>