<?php
header("Content-Type: application/json");
include("../db.php");

$id = $_GET['id'];

$conn->query("DELETE FROM assignments WHERE id='$id'");

echo json_encode(["status" => "success"]);
?>