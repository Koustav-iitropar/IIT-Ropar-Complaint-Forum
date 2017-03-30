<?php
$servername = "localhost";
$username1 = "user5";
$password1 = "project4";
$dbname = "project4";
$username = $_POST['uname'];
$password = $_POST['psw'];

$connection = mysqli_connect($servername,$username1,$password1,$dbname);
$table = "Login_demo";
$result = mysqli_query($connection,"SELECT * FROM $table WHERE username = '$username' AND password = '$password'")
                or die("Failed to query the database ".mysql_error());
$row = mysqli_fetch_array($result);
if($row['username'] == $username && $row['password'] == $password){
echo "Login successful";
}
else {
echo "Failed";
}

?>

~                                                                                                                                                     
~                                                                                                                                                     
~                                                                                                                                                     
~                                                                                                                                                     
~                         
