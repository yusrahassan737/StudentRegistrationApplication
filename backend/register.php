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

// Read values sent from the HTML form
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$program = $_POST["program"];

// Perform validation again
header('Content-Type: application/json');
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