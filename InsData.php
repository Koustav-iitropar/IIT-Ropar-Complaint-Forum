<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>


<?php

$username = $password = $email = $repassword = "";

function set_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



// define variables and set to empty values
$usernameErr = $emailErr = $passwordErr = $repasswordErr = $equalErr = "";
$testvar = 0;
$username = $email = $password = $repassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$testvar = 1;
  if (empty($_POST["username"])) {
    $usernameErr = "Name is required";
  } else {
    $username = set_input($_POST["username"]);
	// check if name only contains letters and whitespace
    if (!preg_match("/^\w*$/",$username)) {
      $usernameErr = "Only letters and white space allowed"; 
    }
  }
if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = set_input($_POST["password"]);
  }
  if (empty($_POST["repassword"])) {
    $repasswordErr = "Please re-enter password";
  } else {
    $repassword = set_input($_POST["repassword"]);
	if($password != $repassword){
		$equalErr="Passwords are not same";
		
	}
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = set_input($_POST["email"]);
	if (!preg_match("/^\w*@iitrpr.ac.in$/",$email)) {
      $emailErr = "Use only IIT Ropar email id"; 
    }
  }

  
}


if($usernameErr === "" && $emailErr === "" && $passwordErr === "" && $repasswordErr === "" && $equalErr === "" && $testvar === 1){
	
$servername = "localhost";
$user = "user5";
$pass = "project4";
$dbname = "project4";
//Create connection

$conn = new mysqli($servername, $user, $pass, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO userinf (username, password, email)
VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Successfully";
} else {
    echo "Couldn't register Error: " . $conn->error;
}

$conn->close();
	
}

?>


<fieldset style="width:50%">
<legend align="center"> SignUp </legend>
<table style="width:50%" align="center" cellpadding="5">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
<tr>
<td>Username</td>
<td><input type="text" name="username"><span class="error">* <?php echo $usernameErr;?></span></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password"><span class="error">* <?php echo $passwordErr;?></span></td>
</tr>
<tr>
<td>Retype Password</td>
<td><input type="password" name="repassword"><span class="error">* <?php echo $equalErr;?></span></td>
</tr>
<tr>
<td>Email Id</td>
<td><input type="text" name="email"><span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
<td colspan="2"> <input type="submit" name="submit" value="Submit"> </td>
</tr>
</form>
</table>
</fieldset>

</body>
</html>