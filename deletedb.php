<?php

$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Drop database
$sql = "DROP DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database dropped successfully";
} else {
    echo "Error dropping database: " . $conn->error;
}

$conn->close();
?>