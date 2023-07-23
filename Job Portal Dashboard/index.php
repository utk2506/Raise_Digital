<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en" style="margin-bottom: 50px;">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>JobSpotHub | Home</title>

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

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <?php
            //Show user dashboard link once logged in.
            if (isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) {
            ?>
              <li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php
            } else if (isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) {
            ?>
              <li><a href="company/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php } else {
              //Show Login Links if no one is logged in.
            ?>
              <li><a class="hover" href="company.php">Company</a></li>
              <li><a class="hover" href="register.php">Register</a></li>
              <li><a class="hover" href="login.php">Login</a></li>
              <li><a class="hover" href="admin\index.php">Admin</a></li>
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

        

      }
    </style>
    <div class="container-fluid" id="img">
      <div class="row">
        <div class="col-md-12">
          <div style="background-color:transparent;" class="jumbotron text-center">
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

  <!-- LATEST JOB POSTS -->
  <section>
    <div class="container">
      <div class="row">
        <h2 style="text-decoration: underline;" class="text-center">Latest Job Posts</h2>
        <?php
        /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
        $sql = "SELECT * FROM job_post Order By Rand() Limit 6";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <style>
              .card {

                float: left;
                width: 25%;
                padding: 0 10px;
                height: 350px;
                width: 280px;
                margin-left: 50px;
                margin-top: 50px;
                margin-right: 20px;
                border-radius: 30px;

              }

              /* Remove extra left and right margins, due to padding */
              .row {
                margin: 0 -5px;
              }

              /* Clear floats after the columns */
              .row:after {
                content: "";
                display: table;
                clear: both;
              }

              /* Responsive columns */
              @media screen and (max-width: 600px) {
                .column {
                  width: 100%;
                  display: block;
                  margin-bottom: 20px;
                }
                


              }

              /* Style the counter cards */
              .card {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                padding: 16px;
                text-align: center;
                background-color: #f1f1f1;

              }
            </style>

            <div class="row">
              <div class="column">
                <div class="card">
                  <h3 style="font-weight: 100;text-decoration: underline;" class="card-title"><?php echo $row['jobtitle']; ?></h3>
                  <p style="margin-top:25px" class="card-text"><?php echo $row['description']; ?></p>
                  <a href="./login.php" class="btn btn-primary">View</a>
                </div>
              </div>






          <?php
          }
        }
          ?>
            </div>
      </div>
  </section>

  <!-- COMPANIES LIST -->
  <section>
    <div class="container">
      <div class="row">
        <h2 style="text-decoration: underline; margin-top:50px;" class="text-center">Company list</h2>
        <?php

        $sql = "SELECT * FROM company Order By Rand() Limit 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {

        ?>
            <style>
              .card1 {

                float: left;
                width: 25%;
                padding: 0 10px;
                height: 100px;
                width: 280px;
                margin-left: 50px;
                margin-top: 50px;
                margin-right: 20px;


              }

              /* Remove extra left and right margins, due to padding */
              .row1 {
                margin: 0 -5px;
              }

              /* Clear floats after the columns */
              .row:after {
                content: "";
                display: table;
                clear: both;
              }

              /* Responsive columns */
              @media screen and (max-width: 600px) {
                .column1 {
                  width: 100%;
                  display: block;
                  margin-bottom: 200px;
                }


              }

              /* Style the counter cards */
              .card1 {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                padding: 16px;
                text-align: center;
                background-color: #f1f1f1;
                border-radius: 30px;
              }
            </style>

            <div class="row1">
              <div class="column1">
                <div class="card1">
                  <h3 style="font-weight: 100;text-decoration: underline;" class="card-title"><?php echo $row['companyname']; ?></h3>

                </div>
              </div>
            </div>

        <?php


          }
        }
        ?>

  </section>


  <section>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(function() {
        var maxHeight = 0;

        $(".fixHeight").each(function() {
          maxHeight = ($(this).height() > maxHeight ? $(this).height() : maxHeight);
        });

        $(".fixHeight").height(maxHeight);
      });
    </script>
</body>

</html>