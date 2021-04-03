<?php

$con = mysqli_connect("localhost", "root", "", "attendance");


if(isset($_POST['btn-login']))
{
    
    // echo "<script>alert('START');</script>";
    $date=$_POST['date'];
    $text=$_POST['text'];
    // $accept=$_POST['accept'];
    // $deny=$_POST['deny'];
    $date = mysqli_real_escape_string($con, $date); 
    $sql_chk="SELECT * FROM `".$date."`";
    $r_chk=mysqli_query($con, $sql_chk);
    $count_chk = mysqli_num_rows($r_chk);
    if($count_chk>0){
        // echo "<script>alert('TABLE ALREADY CREATED');</script>";
    }
    else{ 
    $sql1="CREATE TABLE `".$date."`(
        emp_id VARCHAR(10),
        status_check VARCHAR(10) )
        ";
    $r1=mysqli_query($con, $sql1);

    $sql2="INSERT INTO `".$date."`(emp_id) SELECT emp_id FROM employee_details ";  
    $r2=mysqli_query($con, $sql2);
    $sql0="SELECT * from `leave_application` where status_val='accept'";
    $r0=mysqli_query($con,$sql0);
    while($row1 = mysqli_fetch_array($r0))
    {
        $from=$row1['from_date'];
        $to=$row1['to_date'];
        $f1= strtotime($from);
        $t1 = strtotime($to);
        $d1= strtotime($date);
        if(($d1>=$f1)&&($d1<=$t1))
        {
            echo "<script>alert('Leave');</script>";
            $sql00 = "UPDATE `".$date."` SET status_check= 'leave' WHERE emp_id='".$row1['emp_id']."'";
            $r00=mysqli_query($con, $sql00);
        }
            $sql3 = "UPDATE `".$date."` SET status_check= 'absent' WHERE emp_id!='".$row1['emp_id']."'";
            $r3=mysqli_query($con, $sql3);
        
    }
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
        $sql5 = "UPDATE `".$date."` SET status_check= 'present' WHERE emp_id='$text' ";
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
    $sql6="SELECT emp_id from `".$date."` where status_check = 'present'";
    $r6=mysqli_query($con,$sql6);
    while($row = mysqli_fetch_array($r6))
    {
        $sql7 = "UPDATE `employee_details` SET total_present=total_present+1, total_workingdays=total_workingdays+1 WHERE emp_id='".$row['emp_id']."' ";
        $r7=mysqli_query($con, $sql7);
    }
    $sql8="SELECT emp_id from `".$date."` where status_check = 'absent'";
    $r8=mysqli_query($con,$sql8);
    while($row = mysqli_fetch_array($r8))
    {
        $sql9 = "UPDATE `employee_details` SET total_absent=total_absent+1, total_workingdays=total_workingdays+1 WHERE emp_id='".$row['emp_id']."' ";
        $r9=mysqli_query($con, $sql9);
    }
    $sql10="SELECT emp_id from `".$date."` where status_check = 'leave'";
    $r10=mysqli_query($con,$sql10);
    while($row = mysqli_fetch_array($r10))
    {
        $sql11 = "UPDATE `employee_details` SET total_leave=total_leave+1, total_workingdays=total_workingdays+1 WHERE emp_id='".$row['emp_id']."' ";
        $r11=mysqli_query($con, $sql11);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>