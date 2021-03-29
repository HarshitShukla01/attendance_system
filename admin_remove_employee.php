<?php
$host="localhost";
$user="root";
$password="";
$db="attendance";

$con = mysqli_connect($host,$user,$password,$db);

if(isset($_POST['submit'])){
	$id=$_POST['ID'];
	$id = mysqli_real_escape_string($con, $id);
	 $user_check_query = "SELECT * FROM employee_details WHERE emp_id='$id'";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if(!$user)
  {
  	echo "<script>alert('Employee does not exists');</script>";
  	echo "<script> window.location.assign('admin_remove_employee.html'); </script>";
  }
  else
  {
  	$query = "DELETE FROM employee_details WHERE emp_id='$id' ";
  	mysqli_query($con, $query);
  	echo "<script>alert('Employee Removed');</script>";
  	echo "<script> window.location.assign('admin_remove_employee.html'); </script>";
  }}
  ?>

