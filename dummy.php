<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "main";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_select_data = "SELECT id, name, rollno, mark FROM attendance";
$result = $conn->query($sql_select_data);


if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $isChecked = ($row["mark"] == 'P') ? "checked" : "";


        $value = ($isChecked) ? 'P' : 'A';

        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["rollno"] . "</td>
                <td>
            <input type='hidden' name='original_attendance[" . $row["id"] . "]' value='$value'>
            <input type='checkbox' name='attendance[" . $row["id"] . "]' value='P' $isChecked>
        </td>

              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
}

$conn->close();
?>


<!-- updateattend -->

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    // Loop through the submitted data and update the attendance table
    foreach ($_POST['attendance'] as $id => $mark) {
        $id = $conn->real_escape_string($id);
        $mark = $conn->real_escape_string($mark);

        // Debugging: Print out the data to ensure it's correct
        echo "Updating mark for ID: $id, New Mark: $mark<br>";

        // Update the attendance record in the database
        $sql_update = "UPDATE attendance SET mark = '$mark' WHERE id = '$id'";
        if ($conn->query($sql_update) !== TRUE) {
            die("Error updating attendance: " . $conn->error);
        }
    }
}

$conn->close();
?>