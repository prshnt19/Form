<?php





$servername = "localhost";  //replace your servername
$usernameroot = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "userregistrations";  
$conn =new  mysqli($servername, $usernameroot, $password, $dbname);

if(isset($_POST["username"]))
{
$sql="SELECT * FROM userregistrations WHERE username='".$_POST["username"]."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){echo'<span class="text-danger">username already exists</span>';$valid=false;}




}


$conn->close();



?>
