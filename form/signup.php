
<?php
if(isset($_POST['Submit'])){

  $username=trim($_POST["username"]);
  $password=trim($_POST["password"]);
 $code=trim($_POST["code"]);
  $success='';
 $valid = true;
  if($username =="") {
    $errorMsg=  "error : You did not enter a username.";
    $code= "1" ;$valid=false;  $success='';
  }




    elseif(strlen($password)<6){
    $errorMsg=  "error : Password should be minimum 6 digits";
    $code= "3";$valid=false;  $success='';
  }
 
else
{
$servername = "localhost";  //replace your servername
$usernameroot = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "userregistrations";    //replace your database name

// Create connection
$conn =new  mysqli($servername, $usernameroot, $password, $dbname);
$sql="SELECT * FROM userregistrations WHERE username='".$_POST["username"]."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){$valid=false;  $errorMsg=  "error : Username already exists.";}


$conn->close();

}

if($valid){
 if($code =="POORVA"){$success="success";
	require_once("db_reg.php");}
        //include"ddi.php";echo"hi";} 
else{
    $errorMsg=  "error : Invalid Company Code.";
    $code= "1" ;$valid=false;  $success='';
  }
	
       
}


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   </head>
  
   <body>
    

<div class="login-box">

  

  <center><b><font size="7"color="#ffffff">Register Here</font></b><center>
<div class="column left" text align="center">
    <form action="signup.php" method="post">
    <div class="form-group"><br><br>
    <label>Username:</label><br>
    <input style="height:27px;color:black;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;"type="text" name="username" class="form-control" id="username" value="<?php if(isset($username)&& $success==''){ echo $username; }  ?>"><span style="font-size:15pt;color:red" id="availability"></span>
    </div><br><br>
 <div class="form-group">
    <label>Company Code:</label><br>
    <input style="height:27px;color:black;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;"type="password" name="code" class="form-control" required>
    </div><br><br>
    <div class="form-group">
    <label>Password:</label><br>
    <input style="height:27px;color:black;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;"type="password" name="password" class="form-control" required>
    </div><br>
    <button type="submit" name="Submit" style="font-size:19pt" class="btn btn-primary">Register</button>
<br>

<a href="login.php" style="color:red;font-size:19pt">Already Registered?</a>
</div><font color="red"> <br><?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?></font></div></div></div>
	</form>
</div>
</div>
   </body>

<script>
$(document).ready(function(){
$('#username').keyup(function()
{ var e_username=$(this).val();
$.ajax({
url:"checkreg.php",
method:"POST",
data: {username:e_username},
dataType:"text",
success:function(html){$('#availability').html(html);}
});
});




});
</script>
  
</html>
