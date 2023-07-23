<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter dashboard.php in URL.
if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JobSpotHub | Admin | Job-post</title>


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  

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
           <a class="navbar-brand" href="../index.php" style="font-weight:1000;color:#1261a0;">JobSpotHub</a>

          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="list-group">
            <a href="dashboard.php" class="list-group-item">Dashboard</a>
            <a href="user.php" class="list-group-item">Users</a>
            <a href="company.php" class="list-group-item ">Company</a>
            <a href="job-posts.php" class="list-group-item active">Job Posts</a>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="margin-top: 100px;" class="col-md-6">
          <div class="col-md-6">
        <?php
          $sql = "SELECT * FROM job_post";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            echo '<h3>Total Job Posts: ' . $result->num_rows . '</h3>'; 
          }
        ?>
       
        
          <table class="table">
            <thead>
              <th style="padding: 0px 50px 0px 70px;">SNo</th>
              <th style="padding: 0px 50px 0px 50px;">Job Tile</th>
              <th style="padding: 0px 250px 0px 250px;">Job Description</th>
              <th style="padding: 0px 50px 0px 50px;">Minimum Salary</th>
              <th style="padding: 0px 50px 0px 50px;">Maximum Salary</th>
              <th style="padding: 0px 50px 0px 50px;">Total Users Applied</th>
              <th style="padding: 0px 50px 0px 50px;">Action</th>
            </thead style="padding: 0px 0px 0px 0px;">
            <tbody>
              <?php
                $sql = "SELECT * FROM job_post";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $i = 0;
                  while($row = $result->fetch_assoc()) {
                    ?>
                      <tr style="padding: 0px 0px 0px 26px;">
                        <td style="padding: 0px 0px 0px 71px;"><?php echo ++$i; ?></td>
                        <td style="padding: 0px 0px 0px 26px;"><?php echo $row['jobtitle']; ?></td>
                        <td style="padding: 0px 0px 0px 26px;"><?php echo $row['description']; ?></td>
                        <td style="padding: 0px 0px 0px 55px;"><?php echo $row['minimumsalary']; ?></td>
                        <td style="padding: 0px 0px 0px 55px;"><?php echo $row['maximumsalary']; ?></td>
                        <?php
                          $sql1 = "SELECT COUNT(apply_job_post.id_apply) AS totalNo FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE job_post.id_jobpost='$row[id_jobpost]'";
                          $result1 = $conn->query($sql1);
                          if($result1->num_rows > 0) {
                             while($row1 = $result1->fetch_assoc()) {
                            ?>
                             <td style="padding: 0px 0px 0px 65px;"><?php echo $row1['totalNo']; ?></td>
                            <?php
                          }
                        }
                        ?>
                        <td style="padding: 0px 0px 0px 53px;"><a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Delete</a></td>
                      </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>