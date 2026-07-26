<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

$server = "localhost";
$username = "root";
$password = "";
$database = "college";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    echo json_encode(["status" => "error"]);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$firstName = $data['firstName'] ?? '';
$lastName  = $data['lastName'] ?? '';
$email     = $data['email'] ?? '';
$program   = $data['program'] ?? '';

if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($program) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $sql = "INSERT INTO students(firstName, lastName, program, email)
            VALUES('$firstName', '$lastName','$program','$email')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
        exit;
    }
} else {
    echo json_encode(["status" => "error"]);
    exit;
}

mysqli_close($conn);

?>
