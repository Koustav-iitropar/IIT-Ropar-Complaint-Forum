<?php

$servername = "localhost";
$username = "user5";
$password = "project4";
$dbname = "project4";
$connection = mysqli_connect($servername,$username,$password,$dbname);
$table = "complaint";
if(!$connection)
{
die("Connection failed ");
}
$sql = "CREATE TABLE complaint (
comp_id INT(6) PRIMARY KEY NOT NULL,
reg_date TIMESTAMP NOT NULL,
subject VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
status INT(6) NOT NULL,
FOREIGN KEY (username) REFERENCES Login_demo(username)
)";

if (mysqli_query($connection, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($connection);
}
/*
$sql = "INSERT INTO Login_demo (username, password)
VALUES ('Ranjan', 'ar1234' )";
if(mysqli_query($connection,$sql))
{
echo 'Inserted';
}
else
{
echo 'failed';
}

*/

$sql = "SELECT comp_id,reg_date FROM complaint";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)) {
        echo "Complaint id: " . $row["comp_id"]. " - Date registered: " . $row["reg_date"]. "<br>";
    }
} else {
    echo "0 results";
}

?>

