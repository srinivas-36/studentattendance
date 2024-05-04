<?php

// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "main"; // Change this to your MySQL database name

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['view'])) {
    // Get selected class, section, and type of exam from the form
    $class = $_POST['class'] ?? '';
    $section = $_POST['section'] ?? '';
    $type = $_POST['type'] ?? '';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data from the table based on class, section, and type of exam
    $sql_select_data = "SELECT id, name, rollno, marks FROM marks WHERE class = '$class' AND section = '$section' AND exam_type = '$type'";
    $result = $conn->query($sql_select_data);

    if ($result->num_rows > 0) {
        // Output data of each row in a table format
        echo '<form action="updateMarks.php" method="post">';
        echo '<table class="marks" border="3" cellspacing="3" cellpadding="10">
                <tr>
                  <th>S.NO</th>
                  <th>Name of the Student</th>
                  <th>Roll No</th>
                  <th>Marks</th>
                </tr>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["rollno"] . "</td>
                    <td><input type='text' name='marks[" . $row['id'] . "]' value='" . $row['marks'] . "'></td>
                  </tr>";
        }
        echo '</table>';
        echo '<button type="submit" name="update">Save and Publish</button>';
        echo '</form>';
    } else {
        echo "<p>No exam marks found for the selected class, section, and type of exam</p>";
    }

    $conn->close();
}
?>