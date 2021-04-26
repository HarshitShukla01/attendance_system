<!DOCTYPE html>
<html>
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" href="#">
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<center>
<body>
<?php
$host="localhost";
$user="root";
$password="";
$db="attendance";

$conn = mysqli_connect($host,$user,$password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$sql = "SELECT * FROM   employee_details  WHERE emp_dateofjoining = '11/11/2018'";
$date=date_create($_POST['attendance_date']);

$datee=date_format($date,"Y-m-d");?>

<B style='font-size: 40px;'>Date: <?php echo $datee ?> </B>
<br><br>
<?php
 
$sql = "SELECT * FROM `".$datee."`";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
echo "<table style='width: 40%; text-align: center; font-size: 20px; background-color: lightblue'><tr><th>Emp ID</th><th>Attendance</th></tr>";


while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["emp_id"]. "</td><td>" . $row["status_check"] ."</td></tr>";

}

echo "</table>";

}
else {
echo "0 results";
}


mysqli_close($conn);

?>
<br>
<div>
      <button type="button" onclick="window.print();"class="btn btn-primary">Print</button>
        <a href="admin_view_attendance1.php"><button type="button" class="btn btn-secondary">Go Back</button></a>
      </div>
</body>
</center>
</html>