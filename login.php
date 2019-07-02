



<?php
session_start();
     if(isset($_SESSION['username']))
{	header('Location: table.php');

}

if(isset($_POST['Submit'])){
$valid=true;
  $username=trim($_POST["username"]);
  $password=trim($_POST["password"]);

$servername = "localhost";  //replace your servername
$usernameroot = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "userregistrations";    //replace your database name

// Create connection
$conn =new  mysqli($servername, $usernameroot, $password, $dbname);
$sql="SELECT * FROM userregistrations WHERE username='".$_POST["username"]."' && password='".$_POST["password"]."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){ $success="success";


while($userregistrations = mysqli_fetch_array($result))
{

$nn=$userregistrations['username'];
$_SESSION['username'] = $nn;

  	header('Location: table.php');

}

}



else
{$valid=false;  $errorMsg=  "error : Icorrect credentials";}




       
}




?>


<!DOCTYPE html>
<html>

   <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>User Login and Registration</title>

    <link rel="stylesheet"type="text/css" href="style.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">





  </style>

   </head>
  
   <body>

<div class="login-box">

  <div class="column " text align="center">
    <br><br> 
  <h2><b>Login Here</b></h2><br><br>
  <form  method="post">
  <div class="form-group">
  <label>Username:</label><br>
  <input style="height:27px;color:#ffffff;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;" type="text" name="username" class="form-control" required>
  </div><br><br>
  <div class="form-group">
  <label>Password:</label><br>
  <input style="height:27px;color:#ffffff;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;"  type="password" name="password" class="form-control" required>
  </div><bR><br>
  <button type="login" name="Submit" style="font-size:20pt" class="btn btn-primary">Login</button>
  </form>
  
  </div>
<a href="signup.php" style="color:red;font-size:19pt">Not Registered Yet?</a>
</div>

	</form></div><font color="red"> <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?></font></div>
   </body>


  
</html>
