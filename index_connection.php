<?php
$host="localhost";
$user="root";
$password="";
$db="attendance";

$con = mysqli_connect($host,$user,$password,$db);

if(isset($_POST['btn-login'])){
  $name=$_POST['username'];
  $password=$_POST['password'];
  $designation1=$_POST['designation'];
  $name = mysqli_real_escape_string($con, $name);  
  $password = mysqli_real_escape_string($con, $password);
  $designation1 = mysqli_real_escape_string($con, $designation1);
  if(empty($name) || empty($password) || empty($designation1))
  {
    echo "<script>alert('Please fill the Details..');</script>";
    echo "<script> window.location.assign('index.html'); </script>";
  }
  else
  {
    $sql="SELECT * FROM `employee_details` WHERE emp_id='$name'AND emp_password='$password'AND emp_designation='$designation1'";
    $result=mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);
    if($count==1)
    {
      if($designation1=='employee'){
       echo "<script> window.location.assign('employee_page_index.php'); </script>";
      }
      else if($designation1=='admin'){
        echo "<script> window.location.assign('admin_page_index.html'); </script>";
       }
    }
    else{      
      echo "<script>alert('Your credentials are Wrong');</script>";
      echo "<script> window.location.assign('index.html'); </script>";
    }
  }

}



?>









