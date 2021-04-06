<?php

$con = mysqli_connect("localhost", "root", "", "attendance");
$sql5="SELECT emp_id FROM employee_details where emp_check ='1'";
$r5=mysqli_query($con, $sql5);
$emp_chk="";
while($row1 = mysqli_fetch_array($r5)){
  $emp_chk=$row1['$emp_chk'];
}
//https://www.w3schools.com/php/php_mysql_select.asp
if(isset($_POST['submit']))
{

$email = $_POST['update_email'];
$contact = $_POST['update_contact'];
$address = $_POST['update_address'];

$sql2 = "UPDATE `employee_details` SET emp_email = '$email',emp_phone= '$contact', emp_address= '$address' WHERE emp_id='$emp_chk'";
   $r2=mysqli_query($con, $sql2);

// if(!($email=="no@n"))
// {
//    $sql2 = "UPDATE `employee_details` SET emp_email = '$email' WHERE emp_id='12xyz'";
//    $r2=mysqli_query($con, $sql2);
// }
// if(!($contact=="no@"))
// {
// 	$sql2 = "UPDATE `employee_details` SET emp_phone= '$contact' WHERE emp_id='12xyz'";
//     $r2=mysqli_query($con, $sql2);
// }
// if(!($address=="no@"))
// {
// 	$sql2 = "UPDATE `employee_details` SET emp_address= '$address'WHERE emp_id='12xyz'";
//     $r2=mysqli_query($con, $sql2);
// }
header("location:employee_page_index.php");
 
 }
mysqli_close($con);

?>