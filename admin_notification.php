<?php
$con = mysqli_connect("localhost", "root", "", "attendance");
$sql_query="SELECT * FROM employee_details where emp_id ='11abc'";
$r1=mysqli_query($con, $sql_query);
$id_use="";
$name_use="";
while($row = mysqli_fetch_array($r1)){
  $id_use=$row['emp_id'];
  $name_use=$row['emp_name'];
}
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="admin_notification.css">
    <script src="admin_notification.js"></script>
  </head>
  <body>
    <!--      <div class="vd_title-section clearfix">
      <h1>User Profile Form</h1>
    </div>
    -->
    <div class="wrapper">
      
      <nav id="sidebar">
        
        
        
        <!--<div class="sidebar-header">
          
        </div>-->
        <!--defines for centre image to add/upload
        Name of the employee
        id of the employee-->
        <center>
        
        <img src="emp-image.jpg">
        <br><br>
        <h3><?php echo $id_use ?></h3>
        <h5><?php echo $id_use ?></h5>
        
        </center>
        
        <ul class="lisst-unstyled components" style="
          margin-bottom: relative;
          ">
          
          <!--Profile drop down menu with class active showing is default for every page like HOME PAGE-->
          <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="padding-top: 1px"><i class="fa fa-user" style="font-size:18px;color: rgb(34, 130, 209)"></i>    Profile</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
              <!--Profile Information -->
              <li>
                <a href="admin_page_index1.php"><i class="fa fa-id-badge" style="font-size:18px;color:rgb(20, 45, 78)"></i>    Profile Information</a>
              </li>
              <!-- change password section -->
              <li>
                <a href="#"><i class="fa fa-key" style="font-size:18px;color:rgb(20, 45, 78)"></i>    Change Password</a>
              </li>
            </ul>
            
          </li>
          <!--Notification-->
          <li>
            
            <a href="#" ><i class="fa fa-bell" style="font-size:18px;color:rgb(34, 130, 209)"></i>   Notification</a>
          </li>
          <!--Employee-->
          <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-group" style="font-size:18px;color:rgb(34, 130, 209)"></i>    Employee</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
              <!--Add Employee-->
              <li>
                <a href="admin_add_employee1.php"><i class="fa fa-user-plus" style="font-size:18px;color:rgb(20, 45, 78)"></i>    Add</a>
              </li>
              <!--Remove Employee-->
              <li>
                <a href="admin_remove_employee1.php"><i class="fa fa-minus-square" style="font-size:18px;color:rgb(20, 45, 78)"></i>    Remove</a>
              </li>
            </ul>
            <!--Attendance-->
            <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-address-book" style="font-size:18px;color:rgb(34, 130, 209)"></i>   Attendance</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <!--Take attendance-->
                <li>
                  <a href="admin_take_attendance1.php"><i class="fa fa-plus" style="font-size:18px;color:rgb(20, 45, 78)"></i>   Take Attendance</a>
                </li>
                <!--View attendance-->
                <li>
                  <a href="admin_view_attendance1.php"><i class="fa fa-eye" style="font-size:18px;color:rgb(20, 45, 78)"></i>   View Attendance</a>
                </li>
                
              </ul>
              <ul class="vertical-left">
                <!--Sign Out-->
                <li>
                  <a href="index.php"><i style="font-size:18px" class="fa">&#xf011;</i>  Sign Out</a>
                </li>
              </ul>
            </li>
            
          </li>
        </ul>
      </nav>
      <div id="content">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="
          padding-left: 4px;
          padding-right: 4px;
          ">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn  btn-info">
            <i class="fas fa fa-align-left"></i>
            
            <span></span>
            
            </button>
            
          </div>
        </nav>
        <!--main page start-->
           <div class="notification_body">
             <div class="container" style="text-align: center;">
               <h1>NOTIFICATION</h1>
             </div>
             <div class="container" style="text-align: center;  padding-right: 0px; padding-left: 0px; margin-top: 20px;">
               <?php
                  $con = mysqli_connect("localhost", "root", "", "attendance");
                  //leave_application
                  $sql_query="SELECT * FROM leave_application where status_val = 'none'";
                  $r1=mysqli_query($con, $sql_query);
                  $leave_id="";
                  $leave_name="";
                  $leave_from="";
                  $leave_to="";
                  $leave_reason="";?>
                  <table style="width:100%; background-color: lightblue;">
                     <tr>
                      <th style="font-size: 20px;">Name</th>
                      <th style="font-size: 20px;">Emp Id</th>
                      <th style="font-size: 20px;">From date</th>
                      <th style="font-size: 20px;">To date</th>
                      <th style="font-size: 20px;">Reason</th>
                      <th style="font-size: 20px;">Selection</th>
                    </tr>
                  <?php
                  while($row1 = mysqli_fetch_array($r1)){
                    $leave_id=$row1['emp_id'];
                    $leave_name=$row1['emp_name'];
                    $leave_from=$row1['from_date'];
                    $leave_to=$row1['to_date'];
                    $leave_reason=$row1['reason'];
                    ?>
                     <tr>
                       <td><?php echo $leave_name?></td>
                       <td><?php echo $leave_id ?></td>
                       <td><?php echo $leave_from?></td>
                       <td><?php echo $leave_to?></td>
                       <td><?php echo $leave_reason?></td>
                       <td >
                       <!-- <form action="admin_take_attendance.php" method="POST" > -->
                         <button class=" bo-rad form-control col-6 bg-success" name="accept" style="float: left; font-weight: bold;color:white;">&#10004;</button>
                         <button class="bo-rad form-control col-6 bg-danger" name="deny" style="float: right; color:white;">&#10008;</button>
                        <!-- </form> -->
                       </td>
                     </tr>
                     <?php
                  }
                ?>
              </table>
             </div>
           </div>
        
        <!--main page end-->
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    });
    });
    </script>
  </body>
</html>