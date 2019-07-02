<?php if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('login.php');
    exit;
}
?><?php


$servername = "localhost";  //replace your servername
$usernameroot = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "FirstForm";  
//$conn = new  mysqli($servername, $userrnameroot, $password, $dbname);
$conn = mysqli_connect($servername, $usernameroot, $password, $dbname);







$result = mysqli_query($conn, "DELETE FROM FormDetails WHERE number=".$_POST['id']);
if($result){echo "Success";}
else{echo"Fail".mysqli_error($conn);

}

?>
