
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





$name = $_POST['name'];
$email = $_POST['email'];
$number =  $_POST['number'];
$date =  $_POST['date'];
// sql to create table


$sql = "INSERT INTO FormDetails  VALUES ('$name','$email','$number','$date')";


if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute  " . mysqli_error($conn);
}
 

$conn->close();
?>
