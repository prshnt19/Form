
<?php
if(isset($_POST['Submit'])){

  $name=trim($_POST["name"]);
  $email=trim($_POST["email"]);
  $number=trim($_POST["number"]); 
   $date=trim($_POST["date"]);
  
 $valid = true;
  if($name =="") {
    $errorMsg=  "error : You did not enter a name.";
    $code= "1" ;$valid=false;
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
    $code= "2";$valid=false;}
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
 

elseif($valid){
	require_once("demo.php");
        //include"ddi.php";echo"hi";
       

}

}
?>
<!DOCTYPE html>
<html>

   <head>
   	<meta charset="utf-8">
      <title>Form</title>
	<style type="text/css">
		 .errorMsg{border:2px solid red; }
  .message{color: black; font-weight:bold; }
	.div1{background-image: url(" t.jpeg");
		 height: 900px; color:#000000;
		

		  /* Center and scale the image nicely */
		  background-position: center;
		  background-repeat: no-repeat; background-size: cover;
		 
	}
	div.transbox {
  width: 400px;
  height: 600px;  
  
 

  box-sizing: border-box;
background-color: black;
 border: 5px inset  #000000;
 opacity:0.3;
filter: alpha(opacity=60); 
font-weight: bold;
font-size:25pt;


}
div.transbox p{	
font-weight: bold;
color: #ffffff;

 }



	</style>
   </head>
	
   <body>
   	 <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
	<div class="div1" > 
		<br><br><br>
	<center><b><font size="7">Form</font></b><center>
<p>
	<br><br>
    	<form name= "signUpForm" id= "signUpForm" method= "post" action= "form.php" >
		<div class="transbox" align="left"> 
	
			<p>
			<b>Name:<br style="line-height:0cm"> 
	<input  style="height:27px;color:#ffffff;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;" id="myText" type="name"name="name" placeholder="Enter Your Name "value="<?php if(isset($name)){echo $name;} ?>" <?php if(isset($code) && $code == 1){echo "class=errorMsg" ;} ?>>
			
			<br><br>
			Email: <br> 
			<input  style="height:27px;color:#ffffff;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px "placeholder="Enter a Valid Email Address"  type="email" name="email" id="email" value="<?php if(isset($email)){echo $email; }?>"<?php if(isset($code) && $code == 2){echo "class=errorMsg" ;} ?>>

			<br><br>
			Mobile Number: <br> 
			<input  style="height:27px;color:#ffffff;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:250px" id="myText" type="number" name="number"placeholder="Enter Ten-Digit Number"value="<?php if(isset($number)){echo $number;} ?>"<?php if(isset($code) && $code == 3){echo "class=errorMsg" ;} ?>>

			<br><br>
			Date: <br> 
			<input   style="height:27px;color:#ffffff;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:200px"placeholder="dd/mm/yyyy" id="myText" type="date"name="date" value="<?php if(isset($date)){echo $date;} ?>"<?php if(isset($code) && $code == 4){echo "class=errorMsg" ;} ?>>
tn
			<br> <br>
		<!--	<button type="submit" form="form1" value="Submit" name="Submit" ><font size="5">Submit</font></button></b> -->

<input type="submit" name="Submit" value="Submit" style="font-size:20pt" action="form.php"> 

		
	
      	</form></div></div>



   </body>



	
</html>

