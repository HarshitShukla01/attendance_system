<?php
$con = mysqli_connect("localhost", "root", "", "attendance");
$sql_query="SELECT * FROM employee_details where emp_id ='af'";
$r1=mysqli_query($con, $sql_query);
$id_use="";
$name_use="";
$email_use="";
$dseg_use="";
$phone_use="";
$address_use="";
$dob_use="";
$doj_use="";
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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="employee_page_index.css"> -->
		<style type="text/css">
			<?php include 'employee_page_index.css'; ?>
			</style>
		
		<title>Document</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			<a class="navbar-brand" href="#"><img src="logo1.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<center>
				<img src="<?php echo $image_use ?>" alt="$image_use ">
				<br><br>
				<h3><?php echo $id_use ?></h3>
				<h5><?php echo $name_use ?></h5>
				</center>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#edit-profile-modal" style="cursor: pointer;"><i class="fa fa-user"></i><span>Edit Profile</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#manage-password-modal" style="cursor: pointer;"><i class="fa fa-unlock-alt"></i><span>Manage Password</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#leave-application-modal" style="cursor: pointer;"><i class="fa fa-leanpub"></i><span>Leave Application</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#notification-modal" style="cursor: pointer;"><i class="fa fa-envelope"></i><span>Notification</span></a>
					</li>
					<li class="nav-item">
						<a href="index.php"><i class="fa fa-chevron-circle-right"></i><span>Log Out</span></a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="side-menu">
			<center>
			<img src="<?php echo $image_use ?>" alt="$image_use ">
			<br><br>
			<h3><?php echo $name_use ?></h3>
			<h5><?php echo $id_use ?></h5>
			</center>
			<br>
			<a class="nav-link" data-toggle="modal" data-target="#edit-profile-modal" style="cursor: pointer;"><i class="fa fa-user"></i><span>Edit Profile</span></a>
			<a class="nav-link" data-toggle="modal" data-target="#manage-password-modal" style="cursor: pointer;"><i class="fa fa-unlock-alt"></i><span>Manage Password</span></a>
			<a class="nav-link" data-toggle="modal" data-target="#leave-application-modal" style="cursor: pointer;"><i class="fa fa-leanpub"></i><span style="font-size: 18px;">Leave Application</span></a>
			<a class="nav-link" data-toggle="modal" data-target="#notification-modal" style="cursor: pointer;"><i class="fa fa-envelope"></i><span>Notification</span></a>
			<a href="index.php" style="margin-left: 18px;"><i class="fa fa-chevron-circle-right"></i><span>Log Out</span></a>
		</div>
		<div class="data">
			<div class="card-deck row" style="height: 100vh;">
				<div class="col-lg" id="col_piechart" style="margin-bottom: 30px; margin-top: 30px;">
					<div class="card" id="card_piechart">
							<div id="card_piechart_inside"style="width: 100%; height: 80%;">
								<canvas id="myChart" width="200" height="200" style="padding-bottom: 4px" >
								</canvas>
							</div>
						</div>
				</div>
				<div class="col-lg" id="second_col_big" style="margin-bottom: 10px; margin-top: 30px;">
					<div class="col-lg" style="margin-bottom: 30px;">
                        <div class="card row">
						<div class="card-header" style="text-align: center;"><h4>PROFILE LOG</h4></div>
						<div class="card-body">

							<h5>Email &#10148; <?php echo $email_use ?></h5>
							<h5>Phone &#10148; <?php echo $phone_use?></h5>
							<h5>Adddress &#10148; <?php echo $address_use ?></h5>
							<h5>Desgnation &#10148; <?php echo $dseg_use ?></h5>
							<h5>Date of birth &#10148; <?php echo $dob_use ?></h5>
							<h5>Date of Joining &#10148; <?php echo $doj_use ?></h5>
							<!-- <h5>Total absent = 3</h5>
							<h5>Total leave = 4</h5>
							<h5>Total attendance = 10</h5>
							<h5>Total present = 8</h5>
							<h5>Total absent = 3</h5>
							<h5>Total leave = 4</h5> -->
						</div>
					 </div>
					</div>
					<div class="col-lg">
						<div class="card row" style="background-color:green">
							<div class="card-header" style="text-align: center;"><h4>ATTENDANCE LOG</h4></div>
							<div class="card-body">
								<h5>Total attendance &#10148; <?php echo $total_att?></h5>
								<h5>Total present &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&#10148; <?php echo $present_att ?></h5>
								<h5>Total absent &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10148; <?php echo $absent_att ?></h5>
								<h5>Total leave &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10148; <?php echo $leave_att ?></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div  class="modal"  id="edit-profile-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title text-info">Edit Profile</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<form action="employee_update_info.php" method="POST" style="width: 85%; margin: 0 auto;">
						<div class="form-group" style="margin-top: 5%;" >
							<h5>Email address</h5>
							<input type="email" class="form-control" 
							name="update_email" placeholder="Enter email" value="<?php echo $email_use ?>" >
						</div>
						<div class="form-group" >
							<h5>Contact Number</h5>
							<input type="text" class="form-control" name="update_contact"placeholder="Contact Number"value="<?php echo $phone_use ?>">
						</div>
						<div class="form-group" >
							<h5>Address</h5>
							<input type="text" class="form-control" name="update_address"placeholder="Address" value="<?php echo $address_use ?>">
						</div>
						 <button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</form>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					
				</div>
			</div>
		</div>
		<div class="modal" id="manage-password-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title text-info">Password Manager</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<form action="employee_update_password.php" method="POST" style="width: 85%; margin: 0 auto; ">
						<div class="form-group" style="margin-top: 5%;" >
							<h5>Current Password</h5>
							<input type="password" class="form-control" name="current_password" placeholder="Current Password">
						</div>
						<div class="form-group" >
							<h5>New Password</h5>
							<input type="password" class="form-control" placeholder="New Password" name="new_password">
						</div>
						<div class="form-group" >
							<h5>Confirm New Password</h5>
							<input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_new_password">
						</div>
						<button type="submit" class="btn btn-primary" name="submit1">Submit</button>
					</form>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					
				</div>
			</div>
		</div>
		<div class="modal" id="leave-application-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title text-info">Leave Application</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<form action="leave_application.php" method="POST" style="width: 85%; margin: 0 auto;">
						<div class="form-group" style="margin-top: 5%;" >
							<h5>Enter Name</h5>
							<input type="text" class="form-control" value="<?php echo $name_use ?>" name="name" >
						</div>
						<div class="form-group" >
							<h5>Enter Employee ID</h5>
							<input type="text" class="form-control"  name="employee_id" value="<?php echo $id_use ?>" >
						</div>
						<div class="form-group" >
							<h5>From</h5>
							<input type="date" class="form-control"  name="from" required>
						</div>
						<div class="form-group" >
							<h5>To</h5>
							<input type="date" class="form-control" name="to" required>
						</div>
						<div class="form-group">
							<h5>Reason (in short)</h5>
							<input type="text" class="form-control" name="reason" required>
						</div>
					
					
					<!-- Modal footer -->
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="submit">submit</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal" name="close">close</button>
						</div>
					</form>
					
				</div>
			</div>
		</div>
		<div class="modal" id="notification-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title text-info">Services</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body">
						Sorry for inconvenience..
					</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					
				</div>
			</div>
		</div>
		<script>
      // pie chart script
// start
var ctx = document.getElementById('myChart').getContext('2d');
var myDoughnutChart = new Chart(ctx, {
type: 'doughnut',
data: {
    labels: ['Absent', 'Present', 'Leave'],
    datasets: [{
label: '# of Votes',
data: [<?php echo $absent_att ?>, <?php echo $present_att?>, <?php echo $leave_att ?>],
backgroundColor: [
'red',
'rgb(0, 128, 0)',
'#3CACAE'
],
borderColor: [
'rgba(255, 99, 132, 1)',
'lightgreen',
'rgba(255, 206, 86, 1)'
],
borderWidth: 0.5,
hoverBorderWidth: 2.5
}]
},
options: {
	legend: {
            display: true,
            labels: {
                fontColor: 'black',
                fontSize: 15
            }
        }
}
});
// end
    </script>
	</body>
</html>