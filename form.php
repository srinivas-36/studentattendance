<?php
include ("logindb.php");
$server = "localhost";
$username = "root";
$pass = "";
$database = "project";

$conn = new mysqli($server, $username, $pass, $database);
if ($conn->connect_error) {
    die('connection error :' . $conn->connect_error);
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];


    $stmt = $conn->prepare("insert into Register(username,password,email,phone,gender) values(?,?,?,?,?)");

    $stmt->bind_param('sssss', $username, $password, $email, $phone, $gender);

    $stmt->execute();
    echo "Registration Successfull";

    $stmt->close();
    $conn->close(); // Close database connection

    echo "<script>alert('Registration Successful');
    window.location.href = 'top.html';
    </script>";
    // Redirect to top.html

    exit;
}
// header("Loaction : top.html")


?>