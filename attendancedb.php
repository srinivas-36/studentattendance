<?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server name
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "main"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
    $conn->close();
    exit;
}

// Select the created database
$conn->select_db($database);

// SQL to create table
$sql_create_table = "CREATE TABLE IF NOT EXISTS attendance (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    rollno VARCHAR(20) NOT NULL,
    classname VARCHAR(50) NOT NULL,
    section VARCHAR(10) NOT NULL,
    attendance_date DATE ,
    mark ENUM('A', 'P') NOT NULL
)";


if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'attendance' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
    $conn->close();
    exit;
}

// Insert some sample data into the table
$sql_insert_data = "INSERT INTO attendance (name, rollno, classname, section, attendance_date, mark) VALUES 
('Neha', '21121A0501','cse','a','2024-04-01','A'), 
('Viswa', '21121A0502','cse','a','2024-04-01','A'),

 ('SaikIran', '21121A0503','cse','a','2024-04-01','A'),
 ('Bharat', '21121A0504','cse','a','2024-04-01','A'),
 ('Karthik', '21121A0505','cse','a','2024-04-01','A'),
 ('Keda', '21121A0506','cse','a','2024-04-01','A'),
 ('Titto Reddy', '21121A0507','cse','a','2024-04-01','A'),
 ('Samueal', '21121A0508','cse','a','2024-04-01','A'),
 ('Viswanath', '21121A0509','cse','a','2024-04-01','A'),
 ('Lakshmi Prasanna', '21121A0510','cse','a','2024-04-01','A'),
 ('Neha', '21121A0501','cse','a','2024-04-02','A'), 
 ('Viswa', '21121A0502','cse','a','2024-04-02','A'),
 ('SaikIran', '21121A0503','cse','a','2024-04-01','A'),
 ('Bharat', '21121A0504','cse','a','2024-04-02','A'),
 ('Karthik', '21121A0505','cse','a','2024-04-02','A'),
 ('Keda', '21121A0506','cse','a','2024-04-02','A'),
 ('Titto Reddy', '21121A0507','cse','a','2024-04-02','A'),
 ('Samueal', '21121A0508','cse','a','2024-04-02','A'),
 ('Viswanath', '21121A0509','cse','a','2024-04-02','A'),
 ('Lakshmi Prasanna', '21121A0510','cse','a','2024-04-02','A'),
 ('Neha', '21121A0501','ece','a','2024-04-01','A'), ('Viswa', '21121A0502','ece','a','2024-04-01','A'),
 ('SaikIran', '21121A0503','ece','a','2024-04-01','A'),
 ('Bharat', '21121A0504','ece','a','2024-04-01','A'),
 ('Karthik', '21121A0505','ece','a','2024-04-01','A'),
 ('Keda', '21121A0506','ece','a','2024-04-01','A'),
 ('Titto Reddy', '21121A0507','ece','a','2024-04-01','A'),
 ('Samueal', '21121A0508','ece','a','2024-04-01','A'),
 ('Viswanath', '21121A0509','ece','a','2024-04-01','A'),
 ('Lakshmi Prasanna', '21121A0510','ece','a','2024-04-01','A'),
 ('Neha', '21121A0501','eee','a','2024-04-01','A'), ('Viswa', '21121A0502','ece','a','2024-04-01','A'),
 ('SaikIran', '21121A0503','eee','a','2024-04-01','A'),
 ('Bharat', '21121A0504','eee','a','2024-04-01','A'),
 ('Karthik', '21121A0505','eee','a','2024-04-01','A'),
 ('Keda', '21121A0506','eee','a','2024-04-01','A'),
 ('Titto Reddy', '21121A0507','eee','a','2024-04-01','A'),
 ('Samueal', '21121A0508','eee','a','2024-04-01','A'),
 ('Viswanath', '21121A0509','eee','a','2024-04-01','A'),
 ('Lakshmi Prasanna', '21121A0510','eee','a','2024-04-01','A'),
 ('Neha', '21121A0501','ece','b','2024-04-01','A'), ('Viswa', '21121A0502','ece','b','2024-04-01','A'),
 ('SaikIran', '21121A0503','ece','b','2024-04-01','A'),
 ('Bharat', '21121A0504','ece','b','2024-04-01','A'),
 ('Karthik', '21121A0505','ece','b','2024-04-01','A'),
 ('Keda', '21121A0506','ece','b','2024-04-01','A'),
 ('Titto Reddy', '21121A0507','ece','b','2024-04-01','A'),
 ('Samueal', '21121A0508','ece','b','2024-04-01','A'),
 ('Viswanath', '21121A0509','ece','b','2024-04-01','A'),
 ('Lakshmi Prasanna', '21121A0510','ece','b','2024-04-01','A'),
 ('Neha', '21121A0501','eee','b','2024-04-01','A'), ('Viswa', '21121A0502','ece','b','2024-04-01','A'),
 ('SaikIran', '21121A0503','eee','b','2024-04-01','A'),
 ('Bharat', '21121A0504','eee','b','2024-04-01','A'),
 ('Karthik', '21121A0505','eee','b','2024-04-01','A'),
 ('Keda', '21121A0506','eee','b','2024-04-01','A'),
 ('Titto Reddy', '21121A0507','eee','b','2024-04-01','A'),
 ('Samueal', '21121A0508','eee','b','2024-04-01','A'),
 ('Viswanath', '21121A0509','eee','b','2024-04-01','A'),
 ('Lakshmi Prasanna', '21121A0510','eee','b','2024-04-01','A'),
 ('Neha', '21121A0501','ece','c','2024-04-01','A'), ('Viswa', '21121A0502','ece','c','2024-04-01','A'),
 ('SaikIran', '21121A0503','ece','c','2024-04-01','A'),
 ('Bharat', '21121A0504','ece','c','2024-04-01','A'),
 ('Karthik', '21121A0505','ece','c','2024-04-01','A'),
 ('Keda', '21121A0506','ece','c','2024-04-01','A'),
 ('Titto Reddy', '21121A0507','ece','c','2024-04-01','A'),
 ('Samueal', '21121A0508','ece','c','2024-04-01','A'),
 ('Viswanath', '21121A0509','ece','c','2024-04-01','A'),
 ('Lakshmi Prasanna', '21121A0510','ece','c','2024-04-01','A'),
 ('Neha', '21121A0501','eee','c','2024-04-01','A'), ('Viswa', '21121A0502','eee','c','2024-04-01','A'),
 ('SaikIran', '21121A0503','eee','c','2024-04-01','A'),
 ('Bharat', '21121A0504','eee','c','2024-04-01','A'),
 ('Karthik', '21121A0505','eee','c','2024-04-01','A'),
 ('Keda', '21121A0506','eee','c','2024-04-01','A'),
 ('Titto Reddy', '21121A0507','eee','c','2024-04-01','A'),
 ('Samueal', '21121A0508','eee','c','2024-04-01','A'),
 ('Viswanath', '21121A0509','eee','c','2024-04-01','A'),
 ('Lakshmi Prasanna', '21121A0510','eee','c','2024-04-01','A'),
 
 ('Neha', '21121A0501','cse','a','2024-04-02','A'), ('Viswa', '21121A0502','cse','a','2024-04-02','A'),
 ('SaikIran', '21121A0503','cse','a','2024-04-02','A'),
 ('Bharat', '21121A0504','cse','a','2024-04-02','A'),
 ('Karthik', '21121A0505','cse','a','2024-04-02','A'),
 ('Keda', '21121A0506','cse','a','2024-04-02','A'),
 ('Titto Reddy', '21121A0507','cse','a','2024-04-02','A'),
 ('Samueal', '21121A0508','cse','a','2024-04-02','A'),
 ('Viswanath', '21121A0509','cse','a','2024-04-02','A'),
 ('Lakshmi Prasanna', '21121A0510','cse','a','2024-04-02','A'),
 ('Neha', '21121A0501','cse','a','2024-04-03','A'), ('Viswa', '21121A0502','cse','a','2024-04-03','A'),
 ('SaikIran', '21121A0503','cse','a','2024-04-03','A'),
 ('Bharat', '21121A0504','cse','a','2024-04-03','A'),
 ('Karthik', '21121A0505','cse','a','2024-04-03','A'),
 ('Keda', '21121A0506','cse','a','2024-04-03','A'),
 ('Titto Reddy', '21121A0507','cse','a','2024-04-03','A'),
 ('Samueal', '21121A0508','cse','a','2024-04-03','A'),
 ('Viswanath', '21121A0509','cse','a','2024-04-03','A'),
 ('Lakshmi Prasanna', '21121A0510','cse','a','2024-04-03','A'),
 ('Neha', '21121A0501','cse','a','2024-04-04','A'), ('Viswa', '21121A0502','cse','a','2024-04-04','A'),
 ('Sai Kiran', '21121A0503','cse','a','2024-04-04','A'),
 ('Bharat', '21121A0504', 'cse','a','2024-04-04','A'),
 ('Karthik', '21121A0505', 'cse','a','2024-04-04','A'),
 ('Keda', '21121A0506', 'cse','a','2024-04-04','A'),
 ('Titto Reddy', '21121A0507', 'cse','a','2024-04-04','A'),
 ('Samueal', '21121A0508', 'cse','a','2024-04-04','A'),
 ('Viswanath', '21121A0509', 'cse','a','2024-04-04','A'),
 ('Lakshmi Prasanna', '21121A0510', 'cse','a','2024-04-04','A'),
 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','2024-04-01','A'),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','2024-04-01','A'),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','2024-04-01','A'),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','2024-04-01','A'),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','2024-04-01','A'),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','2024-04-01','A'),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','2024-04-01','A'),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','2024-04-01','A'),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','2024-04-01','A'),
 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','2024-04-01','A'),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','2024-04-01','A'),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','2024-04-01','A'),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','2024-04-01','A'),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','2024-04-01','A'),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','2024-04-01','A'),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','2024-04-01','A'),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','2024-04-01','A'),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','2024-04-01','A'),
 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','2024-04-02','A'),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','2024-04-02','A'),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','2024-04-02','A'),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','2024-04-02','A'),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','2024-04-02','A'),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','2024-04-02','A'),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','2024-04-02','A'),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','2024-04-02','A'),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','2024-04-02','A'),
 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','2024-04-02','A'),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','2024-04-03','A'),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','2024-04-03','A'),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','2024-04-03','A'),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','2024-04-03','A'),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','2024-04-03','A'),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','2024-04-03','A'),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','2024-04-03','A'),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','2024-04-03','A'),
 ('M THARUN', '21121A05D6','cse','c','2024-04-01','A'),
 ('MACHANURU SUVARNA', '21121A05D7','cse','c','2024-04-01','A'),
 ('MADDURI SAI VINEETHA', '21121A05D8','cse','c','2024-04-01','A'),
 ('MADIRI KARTHISH', '21121A05D9','cse','c','2024-04-01','A'),
 ('MALAPATI JANAKI', '21121A05E0','cse','c','2024-04-01','A'),
 ('MALLEPALLI SWETHA', '21121A05E1','cse','c','2024-04-01','A'),
 ('MANDAPALLI ANUSHA', '21121A05E2','cse','c','2024-04-01','A'),
 ('MANDI KAVYA', '21121A05E3','cse','c','2024-04-01','A'),
 ('MANI DASU', '21121A05E4','cse','c','2024-04-01','A'),
 ('MANNE LAKSHMI ABINAYA', '21121A05E5','cse','c','2024-04-01','A')

 ";

if ($conn->query($sql_insert_data) === TRUE) {
    echo "Sample data inserted into table 'attendance' successfully<br>";
} else {
    echo "Error inserting data: " . $conn->error;
    $conn->close();
    exit;
}

$conn->close();
?>