
<?php   

$servername = "localhost";  //replace your servername
$username = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "userregistrations";    //replace your database name

// Create connection
$conn =new  mysqli($servername, $username, $password, $dbname);
//Check connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$username = $_POST['username'];
$password = $_POST['password'];

// sql to create table


$sql = "INSERT INTO userregistrations VALUES ('$username','$password')";


if(mysqli_query($conn, $sql)){
    echo "You have registered successfully.";
} else{
    echo "ERROR: Could not able to execute  " . mysqli_error($conn);
}
 

$conn->close();
?>
