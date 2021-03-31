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
    <link rel="stylesheet" href="admin_take_attendance.css">
    <script src="admin_take_attendance.js"></script>
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
           <div class="take_attendance">
          <div class="container">
            <br>
            <h2 class="text-center text-dark">
            Take Attendance
            </h2>
            <hr>
            <form action="admin_take_attendance.php" method="POST" >
            <div class="row">
              <div class="col-md-6" style="text-align: center;">
              <video id="preview" width="100%" ></video>
              <button type="submit" name="add_att" class="btn btn-info "style="padding-left: 30px;padding-right: 30px;margin-bottom: 50px;margin-top: 40px ;" onclick="myfunc2()">Add+</button>
            </div>
            <div class="col-md-6">
              <label>Qr-code Value</label>
              <input type="text" name="text" id="text" readonly="" class="form-control">
              <br>

              <input class="form-control" type="date" name="date"
              style="width: 60%; margin-bottom: 20px;">
              
                <button type="submit"  class="btn btn-primary btn-block" name="btn-login" onclick="myfunc1()">START ATTENDANCE</button>
              <!-- <button type="button" class="btn btn-primary btn-block" name="start_att">START ATTENDANCE</button> -->
              <button  type="submit" class="btn btn-primary btn-block" name="end_att" onclick="myfunc3()">END TODAY'S ATTENDANCE</button>
            </div>
          </div>
            </form>
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
     document.addEventListener("DOMContentLoaded", event => {
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        }
        else{
        alert("no camera found");}
      }).catch(function(e)
      {
          console.error(e);
      });
    
      scanner.addListener('scan', content => {
        document.getElementById("text").value=content;
      });
    
    });
    // document.getElementById("table_create_Button").onclick = function() {
    // this.disabled = true;
    // document.getElementById("add_button").disabled=false;
    // }
    // document.getElementById("table_update_Button").onclick = function() {
    // document.getElementById("table_create_Button").disabled = false;
    // document.getElementById("add_button").disabled=true;
    // }
    function myfunc1(){
      alert('START');
    }
    function myfunc2(){
      alert('ADD');
    }
    function myfunc3(){
      alert('END');
    }
    
    </script>
  </body>
</html>