<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "college";

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn)
{
    die("Database Connection Failed!");
}

// Read values sent from the HTML form
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$program = $_POST["program"];

// SQL statement
$sql = "INSERT INTO students(firstName, lastName, program, email)
        VALUES('$firstName', '$lastName','$program','$email')";

// Execute SQL
$result = mysqli_query($conn, $sql);

// Check if successful
if ($result) {
    header('Content-Type: application/json');
    exit('{"status":"success"}');
}
else {
    echo "Registration Failed!";
    header('Content-Type: application/json');
    exit('{"status":"error"}');
}

// Close database connection
mysqli_close($conn);

?>