<?php
$host="localhost";
$user="root";
$password="";
$db="attendance";

$con = mysqli_connect($host,$user,$password,$db);

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$id=$_POST['ID'];
	$dob=$_POST['dob'];
	$doj=$_POST['doj'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$email=$_POST['email'];
  $password=$_POST['password'];
 	$designation=$_POST['designation'];

 		$name = mysqli_real_escape_string($con, $name);  
  $id = mysqli_real_escape_string($con, $id);
  $dob = mysqli_real_escape_string($con, $dob);
  $doj = mysqli_real_escape_string($con, $doj);  
  $gender = mysqli_real_escape_string($con, $gender);
  $phone = mysqli_real_escape_string($con, $phone);  
  $address = mysqli_real_escape_string($con, $address);
  $email = mysqli_real_escape_string($con, $email);
  $designation = mysqli_real_escape_string($con, $designation);  
  $password = mysqli_real_escape_string($con, $password);

    $user_check_query = "SELECT * FROM employee_details WHERE emp_id='$id' OR emp_email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
    if ($user['emp_id'] === $id) {
      echo "<script>alert('Employee ID already exists');</script>";
      echo "<script> window.location.assign('admin_add_employee.html'); </script>";
    }

    if ($user['emp_email'] === $email) {
      echo "<script>alert('Email already exists');</script>";
      echo "<script> window.location.assign('admin_add_employee.html'); </script>";
    }
  }
  else{


 	$query = "INSERT INTO employee_details(emp_id, emp_name, emp_password,emp_designation,emp_email,emp_dob,emp_address,emp_dateofjoining,total_present,total_absent,total_leave,total_workingdays,emp_gender) 
  			  VALUES('$id', '$name', '$password','$designation','$email','$dob','$address','$doj','0','0','0','0','$gender')";
  	mysqli_query($con, $query);
  }}
  ?>
<!DOCTYPE html>
<html>
  
  <title>Registration success</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="#">
  </head>
  <body>
    <h1><center>Registration Success</center></h1>
    <center><a href="admin_add_employee.html">OK</a></center>
  </body>
  </html>
