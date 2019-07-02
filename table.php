


<?php 
session_start();
if(!isset($_SESSION['username'])){
    // redirect them to your desired location
    header('Location:login.php');
    exit;
}
?>
<?php
if(isset($_POST['logout'])){  header('Location:login.php');}
if(isset($_POST['Update'])){


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

}

if($valid){
  $success="success";
require_once('database.php');

}



?>

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

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>



<body>
  <a href="logout.php" style="font-size:20pt" class="btn btn-primary">Logout</a>


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




?><td>
<a href="#" class="edit" data-toggle="modal"  "data-target="#myModal" id="<?php echo $FormDetails['number']; ?>">Edit</a>








</td>
<td>
<a href="#" class="delete" id="<?php echo $FormDetails['number']; ?>">Delete</a>

</td>
<?php
echo"</tr>";
}


?>


</table>



<div id="append"></div>
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



$('.edit').click(function()
{ var id = $(this).attr('id');
alert(id);

$.ajax({
  url:"edit.php",
  method:"POST",
  data: {id:id},
  dataType:"text",
  success:function(response){$('#append').html(response);  
 $('#myModal').modal('show');

  
}

    //$('#availability').html(html);
// <button type="button" class="close" data-dismiss="modal">&times;</button>

  });
});





$('#email').keyup(function()
{ var e_email=$(this).val();
$.ajax({
url:"check.php",
method:"POST",
data: {email:e_email},
dataType:"text",
success:function(html){$('#availability').html(html);
}
 
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


 
</script>
</html>




