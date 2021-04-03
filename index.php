<!DOCTYPE html>
<html>
  
  <title>SideBar Menu</title>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Artifika&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@700&display=swap" rel="stylesheet">
<!--     <link rel="stylesheet" href="index.css"> -->
    <style type="text/css">
      <?php include 'index.css'; ?>
      </style>
  </head>
  <body>
    <div class="spinner-wrapper">
<div class="spinner"></div>
</div>
    <main>
      <div class="container glass">
        <div class="dashboard">
          <!-- <div class="logo">
            <img src="logo.jpg">
          </div> -->
          <!-- <div class="dash-background"> -->
          <img src="dash-background1.jpg">
          <!-- </div> -->
        </div>
        <div class="loginform">
          <div class="logo"><img src="logo.png">
               <br>
               <h4 style="font-family: 'Aref Ruqaa', serif;color: #660000;">ARCHER'S GROUP</h4>
          </div>
          <div>
            <form action="index_connection.php" method="POST" >
              <div class="form-group">
                <label >User ID</label>
                <input type="text" name="username" class="form-control" placeholder="Enter User ID">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <label style="margin-top: 5%;">Designation</label>
              <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="designation" value="admin">
                <label class="form-check-label" >Admin</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="designation" value="employee">
                <label class="form-check-label">Employee</label>
              </div>
             <div class="button-class"> 
               <button type="submit" class="btn btn-primary" name="btn-login">Submit</button>
             </div>
              
            </form>
          </div>
        </div>
      </div>
      <div class="social-links">
        <div class="social-photos">
         <a href="https://www.instagram.com/" target="_blank"><img src="f1.jpg"></a> 
        <a href="https://www.facebook.com/"target="_blank"><img src="f2.jpg"></a>
        <a href="https://twitter.com/login"target="_blank"><img src="f3.jpg"></a>
        <a href="https://in.pinterest.com/"target="_blank"><img src="f4.jpg"></a>
        <a href="https://www.linkedin.com/"target="_blank"><img src="f5.jpg"></a>
        </div>
        
      </div>
    </main>

    <script>
$(document).ready(function() {
//Preloader
preloaderFadeOutTime = 6000;
function hidePreloader() {
var preloader = $('.spinner-wrapper');
preloader.fadeOut(preloaderFadeOutTime);
}
hidePreloader();
});
</script>
  </body>
</html>