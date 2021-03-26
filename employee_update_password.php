<?php

$con = mysqli_connect("localhost", "root", "", "attendance");

//https://www.w3schools.com/php/php_mysql_select.asp
if(isset($_POST['submit1']))
{
$user_id="12xyz";
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
  
}
else if($new_pass!=$new_pass1)
{
   echo "<script>alert('confirm password is wrong..');</script>";
}
else
{
	 echo "<script>alert('old password is wrong..');</script>";
}

	

echo "<script> window.location.assign('employee_page_index.html'); </script>";
 
 }
mysqli_close($con);

?>