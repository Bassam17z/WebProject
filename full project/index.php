<?php
    $error='';
    if(isset($_POST['login'])){
        require("db.php");
	    $uname = $_POST['email'];
	    $upass = $_POST['password'];
        if($uname!='' && $upass!=''){
            $sql = "SELECT * FROM users_info WHERE email = '$uname' and password = '$upass';";
	        $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result) ;
	        if (mysqli_num_rows($result)>0){
            session_start();
                 header("Location:mainMenu.php");
                
                 $_SESSION["status"]= "true";
                 $_SESSION["email"]= "$uname";
                 
		        
                
		    }
		    else{
                ?>
		        <script language='JavaScript'>alert('Invalid/Wrong Email or Password!');</script>
                <?php
	        }
            
        }
        else{
            $error = 'Please enter both fields...';
        }
	}
        
    





    ?>




	
    
  
<html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,300,0,0" />
    <title>Auto Sell Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@500&family=Raleway&family=Space+Mono:wght@700&family=Staatliches&display=swap" rel="stylesheet">
<script src="script.js" defer></script>
  </head>
  <body>
    <div id="left">
    <div class="center">
    
    <form id="myForm" onsubmit="return validateForm()" method="POST" action="index.php">
      <div id="img-header"><img src="images\logo3.png"></div>
      <!--<label for="email">Email:</label>-->
      <input type="email" id="email" name="email" required placeholder="Email"/>

      <!--<label for="password">Password:</label>-->
      <input type="password" id="password" name="password" required placeholder="Password" />
      <br>
	  <span id="passwordError" class="error"></span>

     
      <br>
      <input type="submit" id="submitButton" value="Log In" name="login" />
      <div class="error" style="color:red; font-size:14px; margin:10px;"><?php echo $error;?></div>
      <input type="button" id="registerButton" value="Sign Up" name="register" onclick=" transform()"/>




      

    </form>
  </div>
  </div>
  <div id="right">
   <div class="filter"><img id="bg-img"   src="images\futc-SuQqLL-VUs4-unsplash.jpg"></div>
  </div>
  
  </body>
</html>