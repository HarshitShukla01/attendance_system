<?php

$con = mysqli_connect("localhost", "root", "", "attendance");
$sql5="SELECT emp_id FROM employee_details where emp_check ='1'";
$r5=mysqli_query($con, $sql5);
$emp_chk="";
while($row1 = mysqli_fetch_array($r5)){
  $emp_chk=$row1['emp_id'];
}
//https://www.w3schools.com/php/php_mysql_select.asp
if(isset($_POST['submit1']))
{
$user_id="$emp_chk";
$old_pass = $_POST['current_password'];
$new_pass = $_POST['new_password'];
$new_pass1 = $_POST['confirm_new_password'];

$sql1="SELECT * from `employee_details` where emp_id='$user_id' and emp_password='$old_pass'";
$r1=mysqli_query($con, $sql1);

$count = mysqli_num_rows($r1);

if($count==1&&$new_pass==$new_pass1)
{
	$sql2 = "UPDATE `employee_details` SET emp_password= '$new_pass'WHERE emp_id='$user_id'";
    $r2=mysqli_query($con, $sql2);
    echo "<script>alert('Password Update..');</script>";
  
}
else if($new_pass!=$new_pass1)
{
   echo "<script>alert('confirm password is wrong..');</script>";
   

}
else
{
	 echo "<script>alert('old password is wrong..');</script>";
	 
   
}
// time_sleep_until(time()+3);
// header("location:javascript://history.go(-1)");
?>
<script>
	setInterval(function(){window.location.assign('employee_page_index1.php');}, 100);
</script>
<?php
 
 }
mysqli_close($con);

?>