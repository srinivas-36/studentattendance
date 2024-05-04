<?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "main"; // Change this to your MySQL database name

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Get class, section, date, and attendance data from the form
    $class = $_POST['class'] ?? '';
    $section = $_POST['section'] ?? '';
    $date = $_POST['date'] ?? '';
    $attendance = $_POST['attendance'] ?? array();

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update attendance marks
    foreach ($attendance as $student_id => $mark) {
        // Sanitize input to prevent SQL injection
        $student_id = $conn->real_escape_string($student_id);
        $mark = $conn->real_escape_string($mark);

        // Update attendance record
        $sql_update = "UPDATE attendance SET mark = '$mark' WHERE id = '$student_id'";
        if ($conn->query($sql_update) !== TRUE) {
            echo "Error updating attendance: " . $conn->error;
            $conn->close();
            exit;
        }
    }

    // Close connection
    $conn->close();

    // Redirect back to the form page
    echo "<script>alert('updated successfully');
        window.location.href = 'input.html';
        </script>
        ";
    exit;
} else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: display_attendance.php");
    exit;
}
?>