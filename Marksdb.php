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
$sql_create_table = "CREATE TABLE IF NOT EXISTS marks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    rollno VARCHAR(20) NOT NULL,
    class VARCHAR(10) NOT NULL, -- Add column for class
    section VARCHAR(10) NOT NULL, -- Add column for section
    exam_type VARCHAR(20) NOT NULL,
    marks INT(6) NOT NULL
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'marks' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
    $conn->close();
    exit;
}

// Insert some sample data into the table
$sql_insert_data = "INSERT INTO marks (name, rollno, class, section, exam_type, marks)VALUES 
('Neha', '21121A0501','cse','a','thirdsemmid1',20), 
('Viswa', '21121A0502','cse','a','thirdsemmid1',20),

 ('SaikIran', '21121A0503','cse','a','thirdsemmid1',20),
 ('Bharat', '21121A0504','cse','a','thirdsemmid1',20),
 ('Karthik', '21121A0505','cse','a','thirdsemmid1',20),
 ('Keda', '21121A0506','cse','a','thirdsemmid1',20),
 ('Titto Reddy', '21121A0507','cse','a','thirdsemmid1',20),
 ('Samueal', '21121A0508','cse','a','thirdsemmid1',20),
 ('Viswanath', '21121A0509','cse','a','thirdsemmid1',20),
 ('Lakshmi Prasanna', '21121A0510','cse','a','thirdsemmid1',20),
 ('Neha', '21121A0501','cse','a','thirdsemmid2',20), 
 ('Viswa', '21121A0502','cse','a','thirdsemmid2',20),
 ('SaikIran', '21121A0503','cse','a','thirdsemmid2',20),
 ('Bharat', '21121A0504','cse','a','thirdsemmid2',20),
 ('Karthik', '21121A0505','cse','a','thirdsemmid2',20),
 ('Keda', '21121A0506','cse','a','thirdsemmid2',20),
 ('Titto Reddy', '21121A0507','cse','a','thirdsemmid2',20),
 ('Samueal', '21121A0508','cse','a','thirdsemmid2',20),
 ('Viswanath', '21121A0509','cse','a','thirdsemmid2',20),
 ('Lakshmi Prasanna', '21121A0510','cse','a','thirdsemmid2',20),
 ('Neha', '21121A0501','ece','a','thirdsemmid1',20), ('Viswa', '21121A0502','ece','a','thirdsemmid1',20),
 ('SaikIran', '21121A0503','ece','a','thirdsemmid1',20),
 ('Bharat', '21121A0504','ece','a','thirdsemmid1',20),
 ('Karthik', '21121A0505','ece','a','thirdsemmid1',20),
 ('Keda', '21121A0506','ece','a','thirdsemmid1',20),
 ('Titto Reddy', '21121A0507','ece','a','thirdsemmid1',20),
 ('Samueal', '21121A0508','ece','a','thirdsemmid1',20),
 ('Viswanath', '21121A0509','ece','a','thirdsemmid1',20),
 ('Lakshmi Prasanna', '21121A0510','ece','a','thirdsemmid1',20),
 ('Neha', '21121A0501','ece','a','thirdsemmid2',20), ('Viswa', '21121A0502','ece','a','thirdsemmid2',20),
 ('SaikIran', '21121A0503','ece','a','thirdsemmid2',20),
 ('Bharat', '21121A0504','ece','a','thirdsemmid2',20),
 ('Karthik', '21121A0505','ece','a','thirdsemmid2',20),
 ('Keda', '21121A0506','ece','a','thirdsemmid2',20),
 ('Titto Reddy', '21121A0507','ece','a','thirdsemmid2',20),
 ('Samueal', '21121A0508','ece','a','thirdsemmid2',20),
 ('Viswanath', '21121A0509','ece','a','thirdsemmid2',20),
 ('Lakshmi Prasanna', '21121A0510','ece','a','thirdsemmid2',20),
 ('Neha', '21121A0501','eee','a','thirdsemmid1',20), ('Viswa', '21121A0502','ece','a','thirdsemmid1',20),
 ('SaikIran', '21121A0503','eee','a','thirdsemmid1',20),
 ('Bharat', '21121A0504','eee','a','thirdsemmid1',20),
 ('Karthik', '21121A0505','eee','a','thirdsemmid1',20),
 ('Keda', '21121A0506','eee','a','thirdsemmid1',20),
 ('Titto Reddy', '21121A0507','eee','a','thirdsemmid1',20),
 ('Samueal', '21121A0508','eee','a','thirdsemmid1',20),
 ('Viswanath', '21121A0509','eee','a','thirdsemmid1',20),
 ('Lakshmi Prasanna', '21121A0510','eee','a','thirdsemmid1',20),
 ('Neha', '21121A0501','eee','a','thirdsemmid2',20), ('Viswa', '21121A0502','ece','a','thirdsemmid2',20),
 ('SaikIran', '21121A0503','eee','a','thirdsemmid2',20),
 ('Bharat', '21121A0504','eee','a','thirdsemmid2',20),
 ('Karthik', '21121A0505','eee','a','thirdsemmid2',20),
 ('Keda', '21121A0506','eee','a','thirdsemmid2',20),
 ('Titto Reddy', '21121A0507','eee','a','thirdsemmid2',20),
 ('Samueal', '21121A0508','eee','a','thirdsemmid2',20),
 ('Viswanath', '21121A0509','eee','a','thirdsemmid2',20),
 ('Lakshmi Prasanna', '21121A0510','eee','a','thirdsemmid2',20),
 ('Neha', '21121A0501','ece','b','thirdsemmid1',20), ('Viswa', '21121A0502','ece','b','thirdsemmid1',20),
 ('SaikIran', '21121A0503','ece','b','thirdsemmid1',20),
 ('Bharat', '21121A0504','ece','b','thirdsemmid1',20),
 ('Karthik', '21121A0505','ece','b','thirdsemmid1',20),
 ('Keda', '21121A0506','ece','b','thirdsemmid1',20),
 ('Titto Reddy', '21121A0507','ece','b','thirdsemmid1',20),
 ('Samueal', '21121A0508','ece','b','thirdsemmid1',20),
 ('Viswanath', '21121A0509','ece','b','thirdsemmid1',20),
 ('Lakshmi Prasanna', '21121A0510','ece','b','thirdsemmid1',20),
 ('Neha', '21121A0501','ece','b','thirdsemmid2',20), ('Viswa', '21121A0502','ece','b','thirdsemmid2',20),
 ('SaikIran', '21121A0503','ece','b','thirdsemmid2',20),
 ('Bharat', '21121A0504','ece','b','thirdsemmid2',20),
 ('Karthik', '21121A0505','ece','b','thirdsemmid2',20),
 ('Keda', '21121A0506','ece','b','thirdsemmid2',20),
 ('Titto Reddy', '21121A0507','ece','b','thirdsemmid2',20),
 ('Samueal', '21121A0508','ece','b','thirdsemmid2',20),
 ('Viswanath', '21121A0509','ece','b','thirdsemmid2',20),
 ('Lakshmi Prasanna', '21121A0510','ece','b','thirdsemmid2',20),
 ('Neha', '21121A0501','eee','b','thirdsemmid1',20), ('Viswa', '21121A0502','ece','b','thirdsemmid1',20),
 ('SaikIran', '21121A0503','eee','b','thirdsemmid1',20),
 ('Bharat', '21121A0504','eee','b','thirdsemmid1',20),
 ('Karthik', '21121A0505','eee','b','thirdsemmid1',20),
 ('Keda', '21121A0506','eee','b','thirdsemmid1',20),
 ('Titto Reddy', '21121A0507','eee','b','thirdsemmid1',20),
 ('Samueal', '21121A0508','eee','b','thirdsemmid1',20),
 ('Viswanath', '21121A0509','eee','b','thirdsemmid1',20),
 ('Lakshmi Prasanna', '21121A0510','eee','b','thirdsemmid1',20),
 ('Neha', '21121A0501','eee','b','thirdsemmid2',20), ('Viswa', '21121A0502','ece','b','thirdsemmid2',20),
 ('SaikIran', '21121A0503','eee','b','thirdsemmid2',20),
 ('Bharat', '21121A0504','eee','b','thirdsemmid2',20),
 ('Karthik', '21121A0505','eee','b','thirdsemmid2',20),
 ('Keda', '21121A0506','eee','b','thirdsemmid2',20),
 ('Titto Reddy', '21121A0507','eee','b','thirdsemmid2',20),
 ('Samueal', '21121A0508','eee','b','thirdsemmid2',20),
 ('Viswanath', '21121A0509','eee','b','thirdsemmid2',20),
 ('Lakshmi Prasanna', '21121A0510','eee','b','thirdsemmid2',20),
 ('Neha', '21121A0501','ece','c','thirdsemmid1',20), ('Viswa', '21121A0502','ece','c','thirdsemmid1',20),
 ('SaikIran', '21121A0503','ece','c','thirdsemmid1',20),
 ('Bharat', '21121A0504','ece','c','thirdsemmid1',20),
 ('Karthik', '21121A0505','ece','c','thirdsemmid1',20),
 ('Keda', '21121A0506','ece','c','thirdsemmid1',20),
 ('Titto Reddy', '21121A0507','ece','c','thirdsemmid1',20),
 ('Samueal', '21121A0508','ece','c','thirdsemmid1',20),
 ('Viswanath', '21121A0509','ece','c','thirdsemmid1',20),
 ('Lakshmi Prasanna', '21121A0510','ece','c','thirdsemmid1',20),
 ('Neha', '21121A0501','ece','c','thirdsemmid2',20), ('Viswa', '21121A0502','ece','c','thirdsemmid2',20),
 ('SaikIran', '21121A0503','ece','c','thirdsemmid2',20),
 ('Bharat', '21121A0504','ece','c','thirdsemmid2',20),
 ('Karthik', '21121A0505','ece','c','thirdsemmid',20),
 ('Keda', '21121A0506','ece','c','thirdsemmid2',20),
 ('Titto Reddy', '21121A0507','ece','c','thirdsemmid2',20),
 ('Samueal', '21121A0508','ece','c','thirdsemmid2',20),
 ('Viswanath', '21121A0509','ece','c','thirdsemmid2',20),
 ('Lakshmi Prasanna', '21121A0510','ece','c','thirdsemmid2',20),
 ('Neha', '21121A0501','eee','c','thirdsemmid1',20), ('Viswa', '21121A0502','eee','c','thirdsemmid1',20),
 ('SaikIran', '21121A0503','eee','c','thirdsemmid1',20),
 ('Bharat', '21121A0504','eee','c','thirdsemmid1',20),
 ('Karthik', '21121A0505','eee','c','thirdsemmid1',20),
 ('Keda', '21121A0506','eee','c','thirdsemmid1',20),
 ('Titto Reddy', '21121A0507','eee','c','thirdsemmid1',20),
 ('Samueal', '21121A0508','eee','c','thirdsemmid1',20),
 ('Viswanath', '21121A0509','eee','c','thirdsemmid1',20),
 ('Lakshmi Prasanna', '21121A0510','eee','c','thirdsemmid1',20),
 
 ('Neha', '21121A0501','eee','c','thirdsemmid2',20), ('Viswa', '21121A0502','eee','c','thirdsemmid2',20),
 ('SaikIran', '21121A0503','eee','c','thirdsemmid2',20),
 ('Bharat', '21121A0504','eee','c','thirdsemmid2',20),
 ('Karthik', '21121A0505','eee','c','thirdsemmid2',20),
 ('Keda', '21121A0506','eee','c','thirdsemmid2',20),
 ('Titto Reddy', '21121A0507','eee','c','thirdsemmid2',20),
 ('Samueal', '21121A0508','eee','c','thirdsemmid2',20),
 ('Viswanath', '21121A0509','eee','c','thirdsemmid2',20),
 ('Lakshmi Prasanna', '21121A0510','eee','c','thirdsemmid2',20),
 

 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','thirdsemmid1',20),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','thirdsemmid1',20),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','thirdsemmid1',20),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','thirdsemmid1',20),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','thirdsemmid1',20),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','thirdsemmid1',20),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','thirdsemmid1',20),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','thirdsemmid1',20),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','thirdsemmid1',20),
 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','thirdsemmid1',20),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','thirdsemmid1',20),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','thirdsemmid1',20),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','thirdsemmid1',20),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','thirdsemmid1',20),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','thirdsemmid1',20),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','thirdsemmid1',20),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','thirdsemmid1',20),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','thirdsemmid1',20),
 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','thirdsemmid1',20),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','thirdsemmid1',20),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','thirdsemmid1',20),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','thirdsemmid1',20),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','thirdsemmid1',20),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','thirdsemmid1',20),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','thirdsemmid1',20),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','thirdsemmid1',20),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','thirdsemmid1',20),
 ('GONUGUNTLA PRATHIMA CHOWDARY', '21121A0576','cse','b','thirdsemmid2',20),
 ('GORLA VISHNU VARDHAN', '21121A0577','cse','b','thirdsemmid2',20),
 ('GUDDETI SRAVANTHI', '21121A0578','cse','b','thirdsemmid2',20),
 ('GUDDITI DIVYA SREE', '21121A0579','cse','b','thirdsemmid2',20),
 ('GUMMALLA DIVYA', '21121A0580','cse','b','thirdsemmid2',20),
 ('GUNDAMPATI SOPHIA MARGARET', '21121A0581','cse','b','thirdsemmid2',20),
 ('GUNTHA VISHNU VARDHAN REDDY', '21121A0582','cse','b','thirdsemmid2',20),
 ('GURRAM AJITHKUMAR', '21121A0583','cse','b','thirdsemmid2',20),
 ('GUVVALA PRAMOD', '21121A0584','cse','b','thirdsemmid2',20),
 ('M THARUN', '21121A05D6','cse','c','thirdsemmid1',20),
 ('MACHANURU SUVARNA', '21121A05D7','cse','c','thirdsemmid1',20),
 ('MADDURI SAI VINEETHA', '21121A05D8','cse','c','thirdsemmid1',20),
 ('MADIRI KARTHISH', '21121A05D9','cse','c','thirdsemmid1',20),
 ('MALAPATI JANAKI', '21121A05E0','cse','c','thirdsemmid1',20),
 ('MALLEPALLI SWETHA', '21121A05E1','cse','c','thirdsemmid1',20),
 ('MANDAPALLI ANUSHA', '21121A05E2','cse','c','thirdsemmid1',20),
 ('MANDI KAVYA', '21121A05E3','cse','c','thirdsemmid1',20),
 ('MANI DASU', '21121A05E4','cse','c','thirdsemmid1',20),
 ('MANNE LAKSHMI ABINAYA', '21121A05E5','cse','c','thirdsemmid1',20),
 ('M THARUN', '21121A05D6','cse','c','thirdsemmid2',20),
 ('MACHANURU SUVARNA', '21121A05D7','cse','c','thirdsemmid2',20),
 ('MADDURI SAI VINEETHA', '21121A05D8','cse','c','thirdsemmid2',20),
 ('MADIRI KARTHISH', '21121A05D9','cse','c','thirdsemmid2',20),
 ('MALAPATI JANAKI', '21121A05E0','cse','c','thirdsemmid2',20),
 ('MALLEPALLI SWETHA', '21121A05E1','cse','c','thirdsemmid2',20),
 ('MANDAPALLI ANUSHA', '21121A05E2','cse','c','thirdsemmid2',20),
 ('MANDI KAVYA', '21121A05E3','cse','c','thirdsemmid2',20),
 ('MANI DASU', '21121A05E4','cse','c','thirdsemmid2',20),
 ('MANNE LAKSHMI ABINAYA', '21121A05E5','cse','c','thirdsemmid2',20)

 ";

if ($conn->query($sql_insert_data) === TRUE) {
    echo "Sample data inserted into table 'marks' successfully<br>";
} else {
    echo "Error inserting data: " . $conn->error;
    $conn->close();
    exit;
}

$conn->close();
?>