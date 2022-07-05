<?php
require 'includes/check_account.php';
session_start();
$account=Check($_SESSION['sun'],$_SESSION['sps']);

if(empty($_SESSION['sun']) || $account=="login-failed"){
  header("Location: signin.php");
  exit();
}

include 'includes/db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>AyudaSys Manage Necessity</title>
    <link rel="shortcut icon" href="images/logo2.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">




    <!-- Custom styles for this template -->
    <link href="styles/card.css" rel="stylesheet">
    <link href="styles/adminpage.css" rel="stylesheet">

</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand brand-title" href="index.php">AyudaSys </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link links" href="includes/home_check.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link links" href="includes/logout.php">Log out</a>
          </li>
        </ul>
    </nav>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Show Ayuda Packages List Page</h1>
      <p class="lead">The Ayuda Packages List Page shows the list of the ayuda packages content. </p>
    </div>
  <!--packagechooseing-->
  <br>
  <button class="w-100 btn btn-primary " type="submit" id="btns" onclick="camo()">Show Packages Content</button>
  <!-- Custom styles for this template -->
  <div id="camo">
    <?php
      $sql = "SELECT * FROM ayuda_package;";
      $result = mysqli_query($conn, $sql);
      $RC = mysqli_num_rows($result);
      if ($RC > 0 ){
        echo "<div class='container'> <div class='card-deck  text-center'> ";
        //echo "<br>";
        while($row = mysqli_fetch_assoc($result)){
        echo "<div class='card lg-4  light-sm'>  <div class='card-header' >";
        echo "<p> Package Name: ".$row['name']." </p> " ;
        echo "</div> <div class='card-body text-center'>" ;
        echo "<p class='primary'> Package Content: ". $row['package_content']. "</p>  " ;
        echo "</div> </div>";
        

      //echo "<br>";
        }
        echo "</div> </div>";
      }
      ?>
    </div>
    <p> </p>
    <div class="container">
      <div class="card-deck mt-5  text-center">
      <div class="card light-sm col-4" style='margin:auto; padding:0;'>
          <a href="monitor_database.php"><button type="button" id="d1"
              class="btn btn-lg btn-block btn-outline-primary">Return to Monitor Database</button></a>
        </div>
        <div class="card  light-sm col-4" style='margin:auto;  padding:0;'>
          <a href="includes/home_check.php"><button type="button" id="d1"
              class="btn btn-lg btn-block btn-outline-primary">Return Home</button></a>
        </div>
      </div>
    </div>
    <p>&zwnj;</p>




  <script src="java/manage_necessity.js" charset="utf-8"></script>
  </body>
</html>
