<?php
$host="localhost";
$user="root";
$password="";
$db="attendance";

$con = mysqli_connect($host,$user,$password,$db);
$msg="";

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
  $filename = $_FILES["avatar"]["name"];
  $tempname = $_FILES["avatar"]["tmp_name"];    
        $folder = "attimages/".$filename;

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
      echo "<script> window.location.assign('admin_add_employee1.php'); </script>";
    }

    if ($user['emp_email'] === $email) {
      echo "<script>alert('Email already exists');</script>";
      echo "<script> window.location.assign('admin_add_employee1.php'); </script>";
    }
  }
  else{


 	$query = "INSERT INTO employee_details(emp_id, emp_name,emp_imagelink,emp_password,emp_designation,emp_email,emp_dob,emp_address,emp_dateofjoining,total_present,total_absent,total_leave,total_workingdays,emp_gender,emp_phone) 
  			  VALUES('$id', '$name','$filename', '$password','$designation','$email','$dob','$address','$doj','0','0','0','0','$gender',$phone)";
  	mysqli_query($con, $query);
    move_uploaded_file($tempname, $folder); 
    echo "<script>alert('Registered'); </script>";
    echo "<script> window.location.assign('admin_add_employee1.php'); </script>";
  }}
  ?>
