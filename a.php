<?php

function create_database($hostname, $username, $password) {

$h = $hostname;
$u = $username;
$p = $password;

$conn = new mysqli($h, $u, $p);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_query($conn, "SET SESSION sql_mode = ''");
$sql = "CREATE DATABASE FirstForm;
        USE FirstForm;
 CREATE TABLE FormDetails(
  name VARCHAR(30) NOT NULL,
email VARCHAR(50),number bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
date TIMESTAMP
        )";

if ($conn->multi_query($sql) === TRUE) {
echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
}

create_database('localhost', 'root', '647931');

?>
