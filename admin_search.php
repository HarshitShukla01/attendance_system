<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <link rel="stylesheet" href="admin_search.scss">
    <center>
        <h1> Search for single data /record</h1>
        <div class="container">
      
            <form action="" method ="POST">
            <input type ="text"  class="btn" name="emp_id" placeholder="Enter By Id">
            <input type="submit" name="search" class="btn" value="search by id">
          
          </div>
</form>


<?php 

$con = mysqli_connect("localhost", "root", "", "attendance");

if(isset($_POST['search']))
{
  $id=$_POST["emp_id"];
  
$query="SELECT * FROM employee_details where emp_id='$id' and emp_check='0'";
$query_run=mysqli_query($con,$query);
$image_val="";
$emp_id="";
$emp_name="";
$emp_email="";
$emp_designation="";
$emp_dateofjoining="";
$emp_phone="";
$emp_address="";

?>



<table role="table">
  <thead role="rowgroup">
    <tr role="row">
<th role="columnheader">Profile-Image</th>
<th role="columnheader">Id</th>
<th role="columnheader">Name</th>
<th role="columnheader">email</th>
<th role="columnheader">designation</th>
<th role="columnheader">dateofjoining</th>
<th role="columnheader">phone</th>
<th role="columnheader">address</th>
 </tr>
  </thead>

<br>

<?php
while($row=mysqli_fetch_array($query_run))
{
  
  $image_val= $row['emp_imagelink'];
  $emp_id=$row['emp_id'];
  $emp_name=$row['emp_name'];
  $emp_email=$row['emp_email'];
  $emp_designation=$row['emp_designation'];
  $emp_dateofjoining=$row['emp_dateofjoining'];
  $emp_phone=$row['emp_phone'];
  $emp_address=$row['emp_address'];
}
$image_use="attimages/".$image_val;

    ?>
    
<tr>
<td><img style="display:block;" width="150px;" height = "150px; " src="<?php echo $image_use ?>" alt="$image_use "></td>

<td><?php echo $emp_id?></td>
<td><?php echo $emp_name?></td>
<td><?php echo $emp_email?></td>
<td><?php echo $emp_designation?></td>
<td><?php echo $emp_dateofjoining?></td>
<td><?php echo $emp_phone?></td>
<td><?php echo $emp_address?></td>
</tr>

<?php

}


?>

</table>
</div>
<div class=ido>
<li>
                  <a href="admin_view_list.php" target="_self"><i style="font-size:18px" class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
                </li>
</div>
    </center>
    
                
              
    
  </head>
  <body>
  </body>
</html>
