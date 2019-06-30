

<?php



$servername = "localhost";  //replace your servername
$usernameroot = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "FirstForm";  
//$conn = new  mysqli($servername, $userrnameroot, $password, $dbname);
$conn = mysqli_connect($servername, $usernameroot, $password, $dbname);

//$sql="SELECT * from FormDetails";
//$res= mysqli_query($conn,$sql);

$result = mysqli_query($conn, "SELECT * from FormDetails");



?>



<!DOCTYPE html>
<html>

   <head>
<title>Table</title>
<style type="text/css">
table{

border-collapse:collapse;
width:100%;
color:black;
font-family:monospace;
font-size:25px;
text-align:left;
}
th{
background-color:#588c7e;
color:white;

}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>



<body>
<table>
<tr>


<th>Name</th>


<th>Email</th>
<th>Mobile</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>
</tr>


<?php


while($FormDetails = mysqli_fetch_array($result))
{


echo"<tr>";
echo"<td>".$FormDetails['name']."</td>";
echo"<td>".$FormDetails['email']."</td>";
echo"<td>".$FormDetails['number']."</td>";
echo"<td>".$FormDetails['date']."</td>";

$name_e=$FormDetails['name'];



?><td>
<a href="#" class="edit" data-toggle="modal" data-target="#myModal" id="<?php echo $FormDetails['number']; ?>">Edit</a>







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
	require_once("d.php");
        //include"ddi.php";echo"hi";
       

}

}



?>






<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
  
          <h4 class="modal-title">Update Credentials</h4>
        </div>
        <div class="modal-body">
         







<form name= "signUpForm" id= "signUpForm" method= "post" action= "f.php" >
		<div class="transbox" align="left"> 
	
			<p>
			<b>Name:<br style="line-height:0cm"> 
	<input  style="height:27px;color:#000000;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;" id="name" type="text"name="name" placeholder="Enter Your Name " class ="form-control"value="<?php echo $name_e; ?>"><?php if(isset($code) && $code == 1){ echo "<font color=dark red>!</font>" ;} ?>
			
			<br><br>
			Email: <br> 
			<input  style="height:27px;color:#000000;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px "placeholder="Enter a Valid Email Address"  class ="form-control" type="email" name="email" id="email" value="<?php echo $FormDetails['email'];?>"> 
			<?php if(isset($code) && $code == 2){echo "<font color=red>!</font>" ;} ?><span style="font-size:15pt;color:red" id="availability"></span>

			<br><br>
			Mobile Number: <br> 
			<input  style="height:27px;color:#000000;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px "placeholder="Enter a 10 digit number" id="number"  type="number" name="number" class ="form-control" value="<?php echo $FormDetails['number'];?>"> 
			<?php if(isset($code) && $code == 3){echo "<font color=red>!</font>" ;} ?><span style="font-size:15pt;color:red" id="availabilityi"></span>
<br><br>
			Date: <br> 
			<input   style="height:27px;color:#000000;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:200px"id="date" type="date"name="date" class ="form-control" value="<?php echo $FormDetails['date'];?>">
			<?php if(isset($code) && $code == 4){echo "<font color=red>!</font>" ;} ?>

			<br> <br><br>
		<!--	<button type="submit" form="form1" value="Submit" name="Submit" ><font size="5">Submit</font></button></b> -->

 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

		
	
      	</form></div><font color="red"> <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?></font></div>








        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Update</button>
        </div>
      </div>
      
    </div>
  </div>

</td>
<td>
<a href="#" class="delete" id="<?php echo $FormDetails['number']; ?>">Delete</a>

</td>
<?php
echo"</tr>";

}




?>








</table>
</body>
<script>

$(document).ready(function(){
$('.delete').click(function()
{ var id = $(this).attr('id');


$.ajax({
	url:"delete.php",
	method:"POST",
	data: {id:id},
	dataType:"text",
	success:function(response){
		
		alert(response);
		location.reload();
		//$('#availability').html(html);
// <button type="button" class="close" data-dismiss="modal">&times;</button>

	}
});

});

$('.edit').click(function(){

$('#email').keyup(function()
{ var e_email=$(this).val();
$.ajax({
url:"check.php",
method:"POST",
data: {email:e_email},
dataType:"text",
success:function(html){$('#availability').html(html);}
});
});



$('#number').keyup(function()
{ var e_number=$(this).val();
$.ajax({
url:"check1.php",
method:"POST",
data: {number:e_number},
dataType:"text",
success:function(html){$('#availabilityi').html(html);}
});
});
});




});






</script>
</html>



