<?php
require 'includes/check_account.php';
session_start();
$account=Check($_SESSION['sun'],$_SESSION['sps']);
if(empty($_SESSION['sun'])){
  header("Location: signin.php");
  exit();
}
elseif($account=="admin"){
    header("Location: adminpage.php");
    exit();
}
elseif($account=="login-failed"){
  header("Location: signin.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>AyudaSys Barangay Page</title>
  <link rel="shortcut icon" href="images/logo2.ico">

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/pricing/">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

  <section id="title">
  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand brand-title" href="index.php">AyudaSys</a>
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

    </div>
  </nav>
  </section>
  <!-- Custom styles for this template -->
  <link href="styles/adminpage.css" rel="stylesheet">
</head>

<body>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Barangay Official Page</h1>
      <p class="lead">The Barangay Official page allows inputting data of citizens and monitoring the database system</p>
    </div>
    <div class="container">
      <div class="card-deck text-center">
        <div class="card  light-sm">
          <a  href="register_citizen.php"><button type="button" class="btn btn-lg btn-block btn-outline-primary" >Input Data of Citizens<br><br></button></a>
        </div>
        <div class="card  light-sm">
            <a  href="monitor_database.php"><button type="button" class="btn btn-lg btn-block btn-outline-primary"> Monitor Database System<br><br></button></a>
        </div>
        <div class="card  light-sm">
          <a href="distribute.php"><button type="button" class="btn btn-lg btn-block btn-outline-primary">Distribution<br> Page</button></a>
        </div>


      </div>




      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
      </script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <script src="../../assets/js/vendor/holder.min.js"></script>
      <script>
        Holder.addTheme('thumb', {
          bg: '#55595c',
          fg: '#eceeef',
          text: 'Thumbnail'
        });
      </script>
  </body>

  </html>
