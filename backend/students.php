<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "college";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("database connection failed!!");
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$result = mysqli_query($conn, "SELECT * FROM students");
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($students);

mysqli_close($conn);

?>
