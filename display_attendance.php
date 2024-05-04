<?php

// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "main"; // Change this to your MySQL database name

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['view'])) {
    // Get selected class, section, and date from the form
    $class = $_POST['class'] ?? '';
    $section = $_POST['section'] ?? '';
    $date = $_POST['date'] ?? '';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the selected date exists in the table
    $sql_check_date = "SELECT COUNT(*) as count FROM attendance WHERE attendance_date = '$date'";
    $result = $conn->query($sql_check_date);
    $row = $result->fetch_assoc();
    $dateExists = $row['count'] > 0;

    // If the selected date does not exist, insert it into the table
    if (!$dateExists) {
        $sql_insert_date = "INSERT INTO attendance (attendance_date) VALUES ('$date')";
        if ($conn->query($sql_insert_date) !== TRUE) {
            echo "Error inserting date: " . $conn->error;
            $conn->close();
            exit;
        } else {
            echo "date is inserted successfully";
        }
    }

    // SQL query to retrieve data from the table based on class, section, and date
    $sql_select_data = "SELECT id, name, rollno, mark FROM attendance WHERE classname = '$class' AND section = '$section' AND attendance_date = '$date'";
    $result = $conn->query($sql_select_data);

    if ($result->num_rows > 0) {
        // Output data of each row in a table format
        echo '<form action="update_attendance.php" method="post">';
        echo '<table class="attendance" border="3" cellspacing="3" cellpadding="10">
                <tr>
                  <th>S.NO</th>
                  <th>Name of the Student</th>
                  <th>Roll No</th>
                  <th>Mark Attendance</th>
                </tr>';
        while ($row = $result->fetch_assoc()) {
            // Determine whether the checkbox should be checked
            $isChecked = ($row["mark"] == 'P') ? "checked" : "";

            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["rollno"] . "</td>
                    <td><input type='checkbox' name='attendance[" . $row["id"] . "]' value='P' $isChecked></td>
                  </tr>";
        }
        echo '</table>';
        echo '<input type="hidden" name="class" value="' . $class . '">';
        echo '<input type="hidden" name="section" value="' . $section . '">';
        echo '<input type="hidden" name="date" value="' . $date . '">';
        echo '<button type="submit" name="update">Update Attendance</button>';
        echo '</form>';
    } else {
        echo "<p>No attendance records found for the selected date</p>";
    }

    $conn->close();
}
?>