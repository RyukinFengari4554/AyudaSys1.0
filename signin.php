<?php
require 'includes/check_account.php';
session_start();

if(!empty($_SESSION['sun'])){
  $account=Check($_SESSION['sun'],$_SESSION['sps']);
  if($account=="barangay"){
    header("Location: barangay.php");
    exit();
  }
  elseif($account=="admin"){
    header("Location: adminpage.php");
  exit();
  }
  
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

    <title>AyudaSys Signin</title>
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
    <link href="styles/signin.css" rel="stylesheet">


  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand brand-title" href="index.php">AyudaSys </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link links" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link links" href="registration.php">Register</a>
          </li>
        </ul>
    </nav>
  </head>
<div class="hello">

</div>


    <form class="form-signin" action="includes/ab-signin.inc.php" method="POST">
      <h1 class="h3 mb-3 font-weight-normal">Login Page</h1>
      <label for="inputUsername" class="sr-only"></label>
      <input type="text" id="inputEmail" class="form-control" name="un" placeholder="Username" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="ps" placeholder="Password" required="">
      <?php
      $fulUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if (strpos($fulUrl,"signin.php?login=failed") == true){
                    $ra =3-$_SESSION['attempt'];
                    echo "<p style='color: red'> Incorrect Username or Password! Remaining Attempt/s: ".$ra."</p>";
                  };
                  if (strpos($fulUrl,"signin.php?login=failed&attempt=3") == true){
                    echo "<p id='clock' style='color: red'>TIME</p>";
                    countdown('clock','submitbtn', 1, 0);
                    $_SESSION['attempt']=0;
                  };
      ?>
      <div class="checkbox mb-3">

      </div>
      <button class="btn btn-lg btn-primary btn-block" id="submitbtn" type="submit">Sign in</button>

      <p class="mt-5 mb-3 text-muted">© Ayuda-Sys</p>

    </form>
    <script type="text/javascript">
        function countdown(element1, element2, minutes, seconds) {
          
        // set time for the particular countdown
        var time = minutes*60 + seconds;
        var interval = setInterval(function() {
        var el = document.getElementById(element2);
        el.disabled = true;
        var el1 = document.getElementById(element1);
        // if the time is 0 then end the counter
        if(time == 0) {
            el.disabled = false;
            clearInterval(interval);
            setTimeout(function() {
              countdown('clock','submitbtn', 1, 0);
            }, 2000);
        }
        var minutes = Math.floor( time / 60 );
        if (minutes < 10) minutes = "0" + minutes;
        var seconds = time % 60;
        if (seconds < 10) seconds = "0" + seconds; 
        var text = minutes + ':' + seconds;
        el1.innerHTML = text;
        time--;
    }, 1000);
      </script>

  </body>
</html>
