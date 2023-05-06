<?php 
$fnameErr = $lnameErr = $emailErr = $phoneErr = $passErr = "";
$fname = $lname = $phone = $email = $pass = $con_pass = "";

if (isset($_POST['submit'])) {
	require("db.php");	
    $flag=true;
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pass = $_POST["pass"];
    $con_pass = $_POST["con_pass"];


    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
        $flag=false;
    } 
    else {
        $name = $_POST["fname"];
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {	
            $fnameErr = "Only letters and white space allowed"; 
            $flag=false;
        }
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
        $flag=false;
    } 
    else {
        $lname = $_POST["lname"];
        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {	
            $lnameErr = "Only letters and white space allowed"; 
            $flag=false;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag=false;
    }
    else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
            $flag=false;
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $flag=false;
    } 

    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
        $flag=false;
    } 
    else if (!empty($_POST["pass"])){
        $pass = $_POST['pass'];
        if (strcmp($pass, $con_pass) != 0) {
            $passErr = "Password and confirm password don't match";
            $flag=false;
        }
    }
  
    if ($flag == true) {
        $query = "SELECT * FROM users_info WHERE email='$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) >= 1) {
            $message = "Email already taken. Please try another one";
            echo $message;
        } 
        else {
            mysqli_query($con, " INSERT INTO users_info (fname, lname, password, email, number) VALUES ('$fname', '$lname', '$pass', '$email', '$phone');");
            header("Location: mainMenu.html");
        }
    }
}
?>




<!DOCTYPE HTML>  
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,300,0,0" />
    <title>Form Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>
  </head>
  <body>
    <div class="center">
    <h1>
    register
    </h1>
    <form method="POST" action="reg.php">
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="fname" placeholder="enter your first name" required />
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lname" placeholder="enter your last name" required />
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="enter your email" required />
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="pass" placeholder="enter your pass" required />
      <br>
      <span id="passwordError" class="error"></span>
      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" id="confirmPassword" name="con_pass" placeholder="confirm pass" required />
      <br>
      <span id="confirmPasswordError" class="error"></span>
        <br>
      <input type="submit" id="submitButton" value="Log In" name="submit" />

    
    </form>
  </div>
  </body>
</html>