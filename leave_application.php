<?php

$con = mysqli_connect("localhost", "root", "", "attendance");

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $employee_id = $_POST['employee_id'];
    $from =($_POST['from']);
    $f1= strtotime($_POST['from']);
    $to = ($_POST['to']);
    $t1 = strtotime($_POST['to']);
    $reason = $_POST['reason'];

        
        $sql1="SELECT emp_name from `employee_details` where emp_id = '$employee_id'";
        $r1=mysqli_query($con,$sql1);
        $count = mysqli_num_rows($r1);
        if($count>=1)
        {
        $val="";
        while($row = mysqli_fetch_array($r1))
        {
            $val=$row['emp_name'];
        }
            if($val == $name && ($t1 >= $f1))
            {
                $sql_chk="SELECT * FROM `leave_application` WHERE emp_id='$employee_id' AND emp_name='$name' AND from_date='$from' AND to_date='$to'";
                $r_chk=mysqli_query($con, $sql_chk);
                $count_chk = mysqli_num_rows($r_chk);
                if($count_chk>0){
                     echo "<script>alert('TABLE ALREADY CREATED');</script>";
                    
                }
                else{
                    $sql2="INSERT INTO leave_application(emp_name, emp_id,from_date,to_date,reason,status_val) VALUES('$name', '$employee_id','$from', '$to','$reason','None')";        
                    $r2=mysqli_query($con,$sql2);
                    if($r2)
                    {
                        echo "<script>alert('Application Successfull sent..');</script>";
                    }
                }
                
            }
            else
            {      
                echo "<script>alert('Wrong Employee Name..');</script>";
            }
        }
        else
        {
            echo "<script>alert('Wrong employee id');</script>";
        }
        // header("location:javascript://history.go(-1)");
         
}

    
