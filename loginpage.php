

<?php



$servername = "localhost";  //replace your servername
$usernameroot = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "FirstForm";  
//$conn = new  mysqli($servername, $userrnameroot, $password, $dbname);
$conn = mysqli_connect($servername, $userrnameroot, $password, $dbname);

//$sql="SELECT * from FormDetails";
//$res= mysqli_query($conn,$sql);

$result = mysqli_query($conn, "SELECT * from FormDetails");
var_dump($result);


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
</head>



<body>
<table>
<tr>


<th>Name</th>


<th>Email</th>
<th>Mobile</th>
<th>Date</th>
</tr>


<?php


while($FormDetails = mysqli_fetch_array($result))
{


echo"<tr>";
echo"<td>".$FormDetails['name']."</td>";
echo"<td>".$FormDetails['email']."</td>";
echo"<td>".$FormDetails['number']."</td>";
echo"<td>".$FormDetails['date']."</td>";
echo"</tr>";

}

echo "".mysqli_error($conn);



?>








</table>
</body>
</html>
