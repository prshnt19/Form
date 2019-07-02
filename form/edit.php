<?php 
session_start();
if(!isset($_SESSION['username'])){
    // redirect them to your desired location
    header('Location:login.php');
    exit;
}
?><?php


$servername = "localhost";  //replace your servername
$usernameroot = "root";   //replace your username
$password = "647931";        //replace your password
$dbname = "FirstForm";  
//$conn = new  mysqli($servername, $userrnameroot, $password, $dbname);
$conn = mysqli_connect($servername, $usernameroot, $password, $dbname);







$result = mysqli_query($conn, "SELECT * FROM FormDetails WHERE number=".$_POST['id']);




while($FormDetails = mysqli_fetch_array($result))
{



$n=$FormDetails['name'];

$e=$FormDetails['email'];
$no=$FormDetails['number'];
$d=$FormDetails['date'];

$time = strtotime($d);

$d = date('Y-m-d',$time);


}
if(isset($_POST['Update'])){
$query = "UPDATE FormDetails set name='" . $_POST['name'] . "', email='" . $_POST['email'] . "', date='" . $_POST['date'] . "' WHERE number='" . $_POST['number'] . "'" ;
$r = mysqli_query($conn,$query);

if($r){


echo "<script>location.href='table.php';</script>";
}else{
echo "".mysqli_error($conn);
echo "<script>location.href='table.php';</script>";$conn->close();


 }
}

?>

<form name= "signUpForm" id= "signUpForm" method= "post" action= "edit.php" >
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
  
          <h4 class="modal-title">Update Credentials</h4>
        </div>
        <div class="modal-body">
         







    <div class="transbox" align="left"> 
  
      <p>
      <b>Name:<br style="line-height:0cm"> 
  <input  style="height:27px;color:#000000;font-size: 16pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:300px;" id="name" type="text"name="name" placeholder="Enter Your Name " class ="form-control"value="<?php echo $n;





?>"><?php if(isset($code) && $code == 1){ echo "<font color=dark red>!</font>" ;} ?>
      
      <br><br>
      Email: <br> 
      <input  style="height:27px;color:#000000;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px "placeholder="Enter a Valid Email Address"  class ="form-control" type="email" name="email" id="email" value="<?php echo $e;?>"> 
      <?php if(isset($code) && $code == 2){echo "<font color=red>!</font>" ;} ?><span style="font-size:15pt;color:red" id="availability"></span>

      <br><br>
      Mobile Number: <br> 
      <input style="height:27px;color:#000000;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:380px " id="number"  type="none" name="number" class ="form-control"  value="<?php  echo $no;?>">
      <?php if(isset($code) && $code == 3){echo "<font color=red>!</font>" ;} ?><span style="font-size:15pt;color:red" id="availabilityi"></span>
<br><br>
      Date: <br> 
      <input   style="height:27px;color:#000000;font-size: 13pt;background: transparent;border: none;border-bottom: 2px solid #ADD8E6;width:200px"id="date" type="date"name="date" class ="form-control" value="<?php echo $d;?>">
      <?php if(isset($code) && $code == 4){echo "<font color=red>!</font>" ;} ?>

      <br> <br><br>
    <!--  <button type="submit" form="form1" value="Submit" name="Submit" ><font size="5">Submit</font></button></b> -->

 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    
  
      </div><font color="red"> <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?></font></div>








        </div>
        <div class="modal-footer">
          <button type="submit" name="Update" id="Update"class="btn btn-default"  ">Update</button>  
        </div>
      </div>
      
    </div>
  </div>
</form>

