<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "college";

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Database Connection Failed!");
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Read JSON body sent from React 
$data = json_decode(file_get_contents('php://input'), true);

// Read values sent from the HTML form
$firstName = $data['firstName'] ?? '';
$lastName  = $data['lastName'] ?? '';
$email     = $data['email'] ?? '';
$program   = $data['program'] ?? '';

// Perform validation again
if (!empty($firstName) && ctype_alpha($firstName) && !empty($lastName) && ctype_alpha($lastName) && !empty($email) && !empty($program) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // SQL statement
    $sql = "INSERT INTO students(firstName, lastName, program, email)
            VALUES('$firstName', '$lastName','$program','$email')";

    // Execute SQL
    $result = mysqli_query($conn, $sql);

    // Check if successful
    if ($result) {
        echo json_encode(["status" => "success"]);
    }
    else {
        echo json_encode(["status" => "error"]);
        exit;
    }
} else {
        echo json_encode(["status" => "error"]);
        exit;
    }

// Close database connection
mysqli_close($conn);

?>