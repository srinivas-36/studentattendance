<?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "main"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update marks
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['marks']) && is_array($_POST['marks'])) {
        // Prepare the statement for updating marks
        $stmt = $conn->prepare("UPDATE marks SET marks = ? WHERE id = ?");

        // Bind parameters
        $stmt->bind_param("si", $marks, $id);

        foreach ($_POST['marks'] as $id => $marks) {
            // Sanitize input to prevent SQL injection
            $id = $conn->real_escape_string($id);
            $marks = $conn->real_escape_string($marks);

            // Execute the update statement
            if (!$stmt->execute()) {
                die("Error updating marks: " . $stmt->error);
            }
        }

        // Close prepared statement
        $stmt->close();
        echo "<script>alert('updated successfully');
        window.location.href = 'input.html';
        </script>
        ";
    }
}

$conn->close();
?>