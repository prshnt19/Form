<? php 
$servername = "localhost";
$username = "root";
$password = "647931";
$dbname = "my form";

// Create connection
$mysqli = new mysqli("localhost", "root", "647931", "my form");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
$name = mysqli_real_escape_string($_POST['name']);
$email = mysqli_real_escape_string($_POST['email']);
$number = mysqli_real_escape_string($_POST['number']);
$date = mysqli_real_escape_string($_POST['date']);
// sql to create table
$sql = "CREATE TABLE Form (
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
number bigint(20),
date TIMESTAMP
)
VALUES ('$name', '$emAIL', '$number','$date')";



?>
