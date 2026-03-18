<?php
header("Content-Type: application/json");
include("../db.php");

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id='$id'";

if ($conn->query($sql)) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}
?>