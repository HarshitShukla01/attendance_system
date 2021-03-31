<?php
 session_start();
$host="localhost";
$user="root";
$password="";
$db="attendance";
$con = mysqli_connect($host,$user,$password,$db);


 /* $j = "SELECT* FROM employee_details";
        $h = mysql_query($j);
        while ( $rws = mysql_fetch_array($h)){ }*/
       /* if (isset($_SESSION['emp_id'])) {
            $userLoggedIn = $con->real_escape_string($userLoggedIn);
            $user_details_query = mysqli_query($con, "SELECT * FROM employee_details WHERE 'emp_id'={$userLoggedIn}" );
                $data = mysqli_fetch_array($user_details_query);
       }*/
       if (isset($_SESSION['emp_id'])) {
        $Username= $con->real_escape_string($Username);
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
    
      
        <center>
        <?php
        $sql = "SELECT emp_name,emp_id FROM employee_details";
        $result = mysqli_query($con, $sql) or die( mysqli_error($con));
        while ($data = mysqli_fetch_array ($result)){

        ?>
        <div class="p" method="post">
        <img src="userfiles/avatars/default.jpg">
        
        
            <br>
            <br>
            
            <h3><?php echo $data['emp_name']?> </h3>
           <h5><?php echo $data['emp_id']?></h5>
        
        
           </div>
           <?php
        }
        ?>
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
                <a href="#"><i class="fa fa-id-badge" style="font-size:18px;color:rgb(20, 45, 78)"></i>    Profile Information</a>
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
                <a href="#"><i class="fa fa-user-plus" style="font-size:18px;color:rgb(20, 45, 78)"></i>    Add</a>
              </li>
              <!--Remove Employee-->
              <li>
                <a href="#"><i class="fa fa-minus-square" style="font-size:18px;color:rgb(20, 45, 78)"></i>    Remove</a>
              </li>
            </ul>
            <!--Attendance-->
            <li>
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-address-book" style="font-size:18px;color:rgb(34, 130, 209)"></i>   Attendance</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <!--Take attendance-->
                <li>
                  <a href="#"><i class="fa fa-plus" style="font-size:18px;color:rgb(20, 45, 78)"></i>   Take Attendance</a>
                </li>
                <!--View attendance-->
                <li>
                  <a href="#"><i class="fa fa-eye" style="font-size:18px;color:rgb(20, 45, 78)"></i>   View Attendance</a>
                </li>
                
              </ul>
              <ul class="vertical-left">
                <!--Sign Out-->
                <li>
                  <a href="#"><i style="font-size:18px" class="fa">&#xf011;</i>  Sign Out</a>
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
                        <div class="panel-heading no-title" width="100%" cellpadding="0" cellspacing="0" style="max-width: 780px; height:44px;"><h9>Profile Information</h9> </div>
                      </center>
    
                        <div class="container " width="100%" cellpadding="0" cellspacing="0" style="max-width: 800px "style="margin-top:0px;">
                          
                              
                              
                                  
                                      <div class="d-flex justify-content-between align-items-center mb-3">
                                          
                                      </div>
                                      



                                      
           <!-- <p> 
               <a href="index.php?logout='1'" style="color: red;">
                    Click here to Logout
                </a>
            </p>-->
      

<?php
        $sqli = "SELECT * FROM employee_details" ;
        $result = mysqli_query($con, $sqli) or die( mysqli_error($con));
        while ($data = mysqli_fetch_array ($result)){

        ?>

           <!-- $quariy = $mysqli->query("select * from employee_details where selector ='8'");
  $employee_details = mysqli_fetch_array($quariy);?>-->
 


                                      <div class="card mb-3" method="post">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <h6 class="mb-0">Full Name</h6>
                                            </div><div class="col-sm-9 text-secondary"><?php echo $data['emp_name']; ?></div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary"><?php echo $data['emp_id']; ?></div>
                                          </div>
                                          <hr><div class="row"><div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                          </div>
                                          <div class="col-sm-9 text-secondary"><?php echo $data['emp_phone']; ?></div>
                                        </div>
                                        
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Address</h6></div><div class="col-sm-9 text-secondary"><?php echo $data['emp_address']; ?></div>
                                        </div>
                                        <hr><div class="row"><div class="col-sm-3">
                                          <h6 class="mb-0">Date of Birth</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary"><?php echo $data['emp_dob']; ?></div>
                                      </div>

                                      <hr><div class="row"><div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary"><?php echo $data['emp_gender']; ?></div>
                                    </div>

                                    <hr><div class="row"><div class="col-sm-3">
                                      <h6 class="mb-0">Designation</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary"><?php echo $data['emp_designation']; ?></div>
                                  </div>

                                  <hr><div class="row"><div class="col-sm-3">
                                    <h6 class="mb-0">Date of Joining</h6>
                                  </div>
                                  <div class="col-sm-9 text-secondary"><?php echo $data['emp_dateofjoining']; ?></div>
                                </div>
                                      </div>
                                    </div>


                                    <?php
        }
        ?>

    

                                       

                                    
                                     
                              
                              
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
