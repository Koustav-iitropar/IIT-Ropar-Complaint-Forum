
<?php

$servername = "localhost";
$username = "user5";
$password = "project4";
$dbname = "project4";
//Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//create table for normal user information
$sql0 = "CREATE TABLE UserInf (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";
//create table for employee infromation
$sql1 = "CREATE TABLE EmpInf (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
empcode VARCHAR(30) NOT NULL,
email VARCHAR(50),
rank INT UNSIGNED
)";
//if first table is not created then show error
if ($conn->query($sql0) === TRUE) {
    echo "Table UserInf created successfully";
} else {
    echo "Error creating UserInf table: " . $conn->error;
}
//if second table is not created then show error
if ($conn->query($sql1) === TRUE) {
    echo "Table EmpInf created successfully";
} else {
    echo "Error creating EmpInf table: " . $conn->error;
}

$conn->close();
?>