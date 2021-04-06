<?php
$con = mysqli_connect("localhost", "root", "", "attendance");
$sql5="SELECT emp_id FROM employee_details where emp_check ='1'";
$r5=mysqli_query($con, $sql5);
$emp_chk="";
while($row1 = mysqli_fetch_array($r5)){
  $emp_chk=$row1['emp_id'];
}
$sql_query="SELECT * FROM employee_details where emp_id ='$emp_chk'";
$r1=mysqli_query($con, $sql_query);
$id_use="";
$name_use="";
$image_val="";
while($row = mysqli_fetch_array($r1)){
  $id_use=$row['emp_id'];
  $name_use=$row['emp_name'];
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
    <link rel="stylesheet" href="admin_add_employee.css">
    
  </head>
  <body>
    
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
         <form class="form-group" action="admin_add_employee.php" method="POST" enctype="multipart/form-data" >  
  <div class="container">  
  <center>  <h3 class="header">Registeration Form</h3> </center>  
  <hr>  
  <div>
  <label> Name </label>   
<input type="text" name="name" placeholder= "Name" size="15" required />  
      <label> Employee ID </label>   
<input type="text" name="ID" placeholder= "ID" size="5" required /> 
</div>
<br>
<div>
  <label for="avatar">Choose a profile picture:</label>

<input type="file" id="avatar" name="avatar" value=""accept="image/png, image/jpeg" />
   </div>
   <br>
<div>  
<label for="dob">Date of Birth:</label>
<input type="date" id="dob" name="dob" required /> 
<label for="doj">Date of Joining:</label>
<input type="date" id="doj" name="doj" required /> 
</div> 
<br> 
<div>  
<label>   
Gender :  
</label>  
<input type="radio" value="Male" name="gender" checked > Male   
<input type="radio" value="Female" name="gender"> Female   
<input type="radio" value="Other" name="gender"> Other  
</div>  
<div>
<label>   
Phone :  
</label>     
<input type="tel" name="phone" placeholder="phone no." pattern="[0-9]{10}" required />  
</div>
<br> 
<div>
  <label>Designation :</label>
  <input type="radio" value="Employee" name="designation" checked > Employee   
  <input type="radio" value="Employee" name="designation"> Admin    
</div>
    <br>
<div>
  <label>
Current Address :  
</label>
<br>
<textarea cols="80" rows="3" name ="address" placeholder="Current Address" value="address" required>  
</textarea>  
</div>
<br>
<div>
 <label for="email">Email</label>  
 <input type="email" placeholder="Enter Email" name="email" required>  
  </div>
  <br>
  <div>
    <label for="psw">Password</label>  
    <input type="password" placeholder="Enter Password" name="password" required>  
  </div>
  <div>
    <button type="submit" name ="submit" class="registerbtn btn btn-success">Register</button>   
    <a class="btn btn-info" href="card.html">Create Card</a>
</div>
</form> 
         	          <!--MODAL-->
  <!--       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="card">
      <div class="modal-header">
        <h5 class="modal-title" id="CardGenerator">Card Generator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id = "printable">
         <div><input id="qr-text" type="text" placeholder="Text to generate QR code"/></div>
        
        <div>
            <button class="qr-btn" onclick="generateQRCode()">Create QR Code</button>
	      </div>
	      <p id="qr-result">This is deault QR code:</p>
	  <canvas id="qr-code"></canvas>
        
      </div>
      <div class="modal-footer">
        <button type="button" onclick="window.print();"class="btn btn-primary">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
      </div>
    </div>
  </div>
</div>
 -->        
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
		<script>
			/* JS comes here */
			var qr;
			(function() {
                    qr = new QRious({
                    element: document.getElementById('qr-code'),
                    size: 200,
                    value: 'https://studytonight.com'
                });
            })();
            
            function generateQRCode() {
                var qrtext = document.getElementById("qr-text").value;
                document.getElementById("qr-result").innerHTML = "QR code for " + qrtext +":";
                alert(qrtext);
                qr.set({
                    foreground: 'black',
                    size: 200,
                    value: qrtext
                });
            }
	  </script>
  </body>
</html>
