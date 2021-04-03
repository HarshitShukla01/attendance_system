<?php
$con = mysqli_connect("localhost", "root", "", "attendance");
$sql_query="SELECT * FROM employee_details where emp_id ='12xyz'";
$r1=mysqli_query($con, $sql_query);
$id_use="";
$name_use="";
$email_use="";
$dseg_use="";
$phone_use="";
$address_use="";
$dob_use="";
$doj_use="";
$gender_use="";
$total_att="";
$present_att="5";
$absent_att="5";
$leave_att="7";
$image_val="";
while($row = mysqli_fetch_array($r1)){
  $id_use=$row['emp_id'];
  $name_use=$row['emp_name'];
  $email_use=$row['emp_email'];
  $dseg_use=$row['emp_designation'];
  $phone_use=$row['emp_phone'];
  $address_use=$row['emp_address'];
  $dob_use=$row['emp_dob'];
  $doj_use=$row['emp_dateofjoining'];
  $gender_use=$row['emp_gender'];
  $total_att=$row['total_workingdays'];
  $present_att=$row['total_present'];
  $absent_att=$row['total_absent'];
  $leave_att=$row['total_leave'];
$image_val=$row['emp_imagelink'];
}
$image_use="attimages/".$image_val;
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
    <link rel="stylesheet" href="admin_page_index.css">
    <script src="admin_page_index.js"></script>
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
           
            <img src="<?php echo $image_use ?>" alt="$image_use ">
            <br><br>
           <h3><?php echo $id_use ?></h3>
           <h5><?php echo $name_use ?></h5>
          
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
            
            <a href="admin_notification.php" ><i class="fa fa-bell" style="font-size:18px;color:rgb(34, 130, 209)"></i>   Notification</a>
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
        <main class="page-content">
          <div class="container-fluid ">
            <center>
          <!--  <h2>Your Profile</h2>-->
            <hr>
            <!--<div class="row">
              <div class="form-group col-md-12">-->
                <div class="vd_content-section clearfix">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="panel widget light-widget">
                        <div class="panel-heading no-title" width="100%" cellpadding="0" cellspacing="0" style="max-width: 780px;height:44px;"><h9>Profile Information</h9> </div>
                      </center>
    
                        <div class="container " width="100%" cellpadding="0" cellspacing="0" style="max-width: 800px "style="margin-top:0px;">
                          
                              
                              
                                  
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                          
                                      </div>
                                      


                                      <div class="card mb-3">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <h6 class="mb-0">Full Name</h6>
                                            </div><div class="col-sm-9 text-secondary"> <?php echo $name_use ?></div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary"> <?php echo $email_use ?></div>
                                          </div>
                                          <hr><div class="row"><div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                          </div>
                                          <div class="col-sm-9 text-secondary"> <?php echo $phone_use?></div>
                                        </div>
                                        
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Address</h6></div><div class="col-sm-9 text-secondary"> <?php echo $address_use ?></div>
                                        </div>
                                        <hr><div class="row"><div class="col-sm-3">
                                          <h6 class="mb-0">Date of Birth</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary"> <?php echo $dob_use ?></div>
                                      </div>

                                      <hr><div class="row"><div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary"><?php echo $gender_use ?></div>
                                    </div>

                                    <hr><div class="row"><div class="col-sm-3">
                                      <h6 class="mb-0">Designation</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"> <?php echo $dseg_use ?></div>
                                  </div>

                                  <hr><div class="row"><div class="col-sm-3">
                                    <h6 class="mb-0">Date of Joining</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary"> <?php echo $doj_use ?></div>
                                </div>
                                      </div>
                                    </div>




    

                                       

                                    
                                     
                              
                              
                          </div>
                      
                    </div>
                      </div>
                      </div>
              </div>
            
          </div>
          
        </div>
      
        
      </div>
            
              
            </div>
            
      
        </main>
        
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




