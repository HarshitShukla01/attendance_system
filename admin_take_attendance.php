<?php

$con = mysqli_connect("localhost", "root", "", "attendance");


if(isset($_POST['btn-login']))
{
    
    // echo "<script>alert('START');</script>";
    $date=$_POST['date'];
    $date = mysqli_real_escape_string($con, $date); 
    $sql_chk="SELECT * FROM `".$date."`";
    $r_chk=mysqli_query($con, $sql_chk);
    $count_chk = mysqli_num_rows($r_chk);
    if($count_chk>0){
        //echo "<script>alert('TABLE ALREADY CREATED');</script>";
    }
    else{ 
    $sql1="CREATE TABLE `".$date."`(
        emp_id VARCHAR(10),
        status_check VARCHAR(10) )
        ";
    $r1=mysqli_query($con, $sql1);

    $sql2="INSERT INTO `".$date."`(emp_id) SELECT emp_id FROM employee_details ";  
    $r2=mysqli_query($con, $sql2);
    $sql3 = "UPDATE `".$date."` SET status_check= 'ab' ";
    $r3=mysqli_query($con, $sql3);
    }
    header("location:javascript://history.go(-1)");
}

if(isset($_POST['add_att']))
{
    // echo "<script>alert('Add');</script>";
    $text=$_POST['text'];
    $date=$_POST['date'];
    $date = mysqli_real_escape_string($con, $date); 
    $text = mysqli_real_escape_string($con, $text);
    $sql4="SELECT * from `employee_details` where emp_id='$text'";
    $r4=mysqli_query($con,$sql4);
    $c4 = mysqli_num_rows($r4);
    if($c4==1)
    {
        $sql5 = "UPDATE `".$date."` SET status_check= 'pr' WHERE emp_id='$text' ";
        $r5=mysqli_query($con, $sql5);
    }
    else
    {      
        echo "<script>alert('NOT IN THE DATABASE');</script>";
    }
    header("location:javascript://history.go(-1)");
    
} 

if(isset($_POST['end_att']))
{
    //  echo "<script>alert('END');</script>";
    $date=$_POST['date'];
    $date = mysqli_real_escape_string($con, $date); 
    echo "<script>alert('End');</script>";
    $sql6="SELECT emp_id from `".$date."` where status_check = 'pr'";
    $r6=mysqli_query($con,$sql6);
    while($row = mysqli_fetch_array($r6))
    {
        $sql7 = "UPDATE `employee_details` SET total_present=total_present+1, total_workingdays=total_workingdays+1 WHERE emp_id='".$row['emp_id']."' ";
        $r7=mysqli_query($con, $sql7);
    }
    $sql8="SELECT emp_id from `".$date."` where status_check = 'ab'";
    $r8=mysqli_query($con,$sql8);
    while($row = mysqli_fetch_array($r8))
    {
        $sql9 = "UPDATE `employee_details` SET total_absent=total_absent+1, total_workingdays=total_workingdays+1 WHERE emp_id='".$row['emp_id']."' ";
        $r9=mysqli_query($con, $sql9);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>