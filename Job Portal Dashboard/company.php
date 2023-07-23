<?php
//To Handle Session Variables on This Page
session_start();

//If user is already logged in then redirect them back to dashboard. 
if (isset($_SESSION['id_user'])) {
  header("Location: user/dashboard.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" style="margin-bottom: 50px;">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <title>JobSpotHub | Compoany | login</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
  
</head>

<body>

  <!-- NAVIGATION BAR -->
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.php" style="font-weight:1000;color:#1261a0;">JobSpotHub</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <?php
            //Show user dashboard link once logged in.
            //Todo: Check if Company logged in then show company dashboard? 
            if (isset($_SESSION['id_user'])) {
            ?>
              <li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php
            } else {
              //Show Login Links if no one is logged in.
            ?>
              <li><a href="company.php">Company</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
            <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>

  <section>
    <style>
      #img {
        background-image: url("job-portban-main-banner.jpg");
        border-radius: 42px;
        width: 100%;
        height: auto;

      }
    </style>
    <div class="container-fluid" id="img">
      <div class="row">
        <div class="col-md-12">
          <div style="background-color:transparent;margin-left:10px;margin-right:10px" class="jumbotron text-center">
            <h1 style="font-family: 'Courgette', cursive;text-shadow:2px 2px white;">Job Portal</h1>
            <p style="font-family: 'Courgette', cursive;text-shadow:2px 2px white;">Find Your Dream Job</p>
            <!-- <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a></p> -->
            <br>
            <br>
            <br>
            <br>
            <p><a style="font-family: 'Courgette', cursive;" class="btn btn-primary btn-lg" href="search.php" role="button">Search Job</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <style>
    #col-md-4 {
      border-radius: 20px;
      margin-top: 30px;
      height: 300px;

    }
  </style>

  <section class="container1">
    <div   class="container">
      <div  class="row">
        <div style="box-shadow:5px 5px black;" class="col-md-4 col-md-offset-4 well" id="col-md-4">
          <h2 style="text-decoration: underline;font-family: 'Courgette', cursive;text-shadow:2px 2px blue;" class="text-center">Company</h2>
          <br>
          <p class="text-center">If you have to post job related to company then click here button &darr;</p>
           <br>
           <br>
          <div class="pull-left">
            <a style="background-color: #1261a0; color:white;font-family: 'Courgette', cursive;" href="company-register.php" class="btn btn-default">Company Register</a>
            <p> Otherwise register &uarr;</p>
          </div>
          <div class="pull-right">
            <a style="background-color: #1261a0; color:white;font-family: 'Courgette', cursive;margin-left:50px;"href="company-login.php" class="btn btn-default">Company Login</a>
           
            <p> you have account then login &uarr;</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>