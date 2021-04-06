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
      $sql0 = "UPDATE `employee_details` SET emp_check= '0'";
      $r0=mysqli_query($con, $sql0);
      if($designation1=='employee'){
        $sql1 = "UPDATE `employee_details` SET emp_check= '1' WHERE emp_id='$name' ";
        $r1=mysqli_query($con, $sql1);
       echo "<script> window.location.assign('employee_page_index1.php'); </script>";
      }
      else if($designation1=='admin'){
        $sql2 = "UPDATE `employee_details` SET emp_check= '1' WHERE emp_id='$name'";
        $r2=mysqli_query($con, $sql2);
        echo "<script> window.location.assign('admin_page_index1.php'); </script>";
       }
    }
    else{      
      echo "<script>alert('Your credentials are Wrong');</script>";
      echo "<script> window.location.assign('index.html'); </script>";
    }
  }

}



?>









