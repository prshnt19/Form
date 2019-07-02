
<?php
if(isset($_POST['Submit'])){


  $name=trim($_POST["name"]);
  $email=trim($_POST["email"]);
  $number=trim($_POST["number"]); 
   $date=trim($_POST["date"]);
  $success='';
 $valid = true;
  if($name =="") {
    $errorMsg=  "error : You did not enter a name.";
    $code= "1" ;$valid=false;
  }
 elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $errorMsg = 'Only letters and white space allowed in name';  $code= "1" ;$valid=false;
    }
 
 
  //check if email field is empty
  elseif($email ==""){
    $errorMsg=  "error : You did not enter a email.";
    $code= "2";$valid=false;
} //check for valid email 
elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
  $errorMsg= 'error : You did not enter a valid email.';
  $code= "2";$valid=false;
}
elseif($number ==""){
    $errorMsg=  "error : You did not enter number.";
    $code= "3";$valid=false;}
 //check if the number field is numeric
  elseif(is_numeric(trim($number)) == false){
    $errorMsg=  "error : Please enter numeric value.";
    $code= "3";$valid=false;
  }
    elseif(strlen($number)<10){
    $errorMsg=  "error : Number should be ten digits.";
    $code= "3";$valid=false;
  }
  elseif($date =="") {
    $errorMsg=  "error : You did not enter a date.";
    $code= "4" ;$valid=false;
  }
else
{
$servername = "localhost";  //replace your servername
$username = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "FirstForm";    //replace your database name

// Create connection
$conn =new  mysqli($servername, $username, $password, $dbname);
$sql="SELECT * FROM FormDetails WHERE email='".$_POST["email"]."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){$valid=false;  $errorMsg=  "error : Email already exists.";}
$query="SELECT * FROM FormDetails WHERE number='".$_POST["number"]."'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){$valid=false;  $errorMsg=  "error : Mobole number already exists";}


$conn->close();

}

if($valid){
	$success="success";
	require_once("database.php");
        //include"ddi.php";echo"hi";
       

}

}

if(isset($_POST['CompanyUser'])){


header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>

   <head>
   	<meta charset="utf-8">
      <title>Form</title>
	<style type="text/css">
		 .errorMsg{border:none;border-bottom:5px solid grey;font-size:5pt;color:red}
  .message{color: red; font-weight:bold;font-size:15pt; }
	.div1{background-image: url(" bg.jpg");
		 height: 900px; 
                      filter:blur(0.00001px); 
		  /* Center and scale the image nicely */
		  background-position: center;
		  background-repeat: no-repeat; background-size: cover;
		 
	}
	div.transbox {
  width: 400px;
  height: 600px;  
  
 

  box-sizing: border-box;
background-color: black;

 border: 5px inset  grey;
background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.5); /* Black w/opacity/see-through */

  font-weight: bold;

  
font-size:23pt;



}
div.transbox p{	
font-weight: bold;
color: #ffffff;

 }



	</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   </head>
	
   <body>
   	
	<div class="div1" > 
<form method="POST">
<input id='btn' name="CompanyUser" type='submit' style="font-size:17pt" value='Company User'><?php
//include "loginsignup.php";
?></form>
		<br><br><br>
	<center><b><font size="7">Form</font></b><center>
<p>
	<br><br>
    	<form name= "signUpForm" id= "signUpForm" method= "post" action= "form.php" >
		<div class="transbox" align="left"> 
	
			<p>
			<b>Name:<br style="line-height:0cm"> 
	<input  style="height:27px;color:#ffffff;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;" id="name" type="text"name="name" placeholder="Enter Your Name " class ="form-control"value="<?php if(isset($name)&& $success==''){echo $name;} ?>"><?php if(isset($code) && $code == 1){ echo "<font color=dark red>!</font>" ;} ?>
			
			<br><br>
			Email: <br> 
			<input  style="height:27px;color:#ffffff;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px "placeholder="Enter a Valid Email Address"  class ="form-control" type="email" name="email" id="email" value="<?php if(isset($email)&& $success==''){echo $email;}?>"> 
			<?php if(isset($code) && $code == 2){echo "<font color=red>!</font>" ;} ?><span style="font-size:15pt;color:red" id="availability"></span>

			<br><br>
			Mobile Number: <br> 
			<input  style="height:27px;color:#ffffff;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px "placeholder="Enter a 10 digit number" id="number"  type="number" name="number" class ="form-control" value="<?php if(isset($number)&& $success==''){echo $number;}?>"> 
			<?php if(isset($code) && $code == 3){echo "<font color=red>!</font>" ;} ?><span style="font-size:15pt;color:red" id="availabilityi"></span>
<br><br>
			Date: <br> 
			<input   style="height:27px;color:#ffffff;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:200px" id="date" type="date" name="date" class ="form-control" value="<?php if(isset($date)&& $success==''){echo $date;} ?>">
			<?php if(isset($code) && $code == 4){echo "<font color=red>!</font>" ;} ?>

			<br> <br><br>
		<!--	<button type="submit" form="form1" value="Submit" name="Submit" ><font size="5">Submit</font></button></b> -->

<input type="submit" name="Submit" value="Submit" style="font-size:20pt" "> 

		
	
      	</form></div><font color="red"> <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?></font></div>



   </body>

<script>
$(document).ready(function(){
$('#email').keyup(function()
{ var e_email=$(this).val();
$.ajax({
url:"checkemail.php",
method:"POST",
data: {email:e_email},
dataType:"text",
success:function(html){$('#availability').html(html);}
});
});



$('#number').keyup(function()
{ var e_number=$(this).val();
$.ajax({
url:"checknumber.php",
method:"POST",
data: {number:e_number},
dataType:"text",
success:function(html){$('#availabilityi').html(html);}
});
});
});
</script>

	
</html>




