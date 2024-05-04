<?php
$server = "localhost";
$username = "root";
$pass = "";
$database = "project";

$conn = new mysqli($server, $username, $pass, $database);
if ($conn->connect_error) {
    die('connection error :' . $conn->connect_error);
} else {
    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = "SELECT * from Register where username = '$username' and password = '$password'";

        $result = mysqli_query($conn, $stmt);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if ($count == 1) {
            header("Location: input.html");
        } else {

            echo "<script>
            
            alert('Invalid Credientials');
            window.location.href = 'top.html';
            </script>
            ";
        }


    }
}

?>