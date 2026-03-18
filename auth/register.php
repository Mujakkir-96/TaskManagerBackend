<?php
header("Content-Type: application/json");
include("../db.php");

$data = json_decode(file_get_contents("php://input"));

$name = $data->name;
$email = $data->email;
$password = $data->password;

// check if user exists
$check = $conn->query("SELECT * FROM users WHERE email='$email'");

if ($check->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "User already exists"]);
    exit();
}

// insert user
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql)) {
    echo json_encode(["status" => "success", "message" => "User registered"]);
} else {
    echo json_encode(["status" => "error", "message" => "Registration failed"]);
}
?>