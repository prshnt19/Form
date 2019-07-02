
<?php   

$servername = "localhost";  //replace your servername
$username = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "FirstForm";    //replace your database name

// Create connection
$conn =new  mysqli($servername, $username, $password, $dbname);
//Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["number"]))
{
$sql="SELECT * FROM FormDetails WHERE number='".$_POST["number"]."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){echo'<span class="text-danger">Mobile already registered</span>';$valid=false;}


}




$conn->close();
?>


