<?php
require 'includes/check_account.php';
session_start();
$account=Check($_SESSION['sun'],$_SESSION['sps']);

if(empty($_SESSION['sun']) || $account=="login-failed"){
  header("Location: signin.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- styles commented on May 15,2022
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>AyudaSys Distribute Page</title>

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
    <a class="navbar-brand brand-title" href="index.html">AyudaSys </a>
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
  <link href="styles/adminpage.CSS" rel="stylesheet">
</head>


<body>
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Distribute Page</h1>
    <p class="lead">Allows for viewing the ordered Ayuda package and status of the distribution.</p>
  </div>
  <div class="container">
        <div>
            <center>
            <video  width="auto" height="auto" id="preview"></video>
            </center>
        </div>
        <div>
          <form name="form" action="distribute_ayuda.php" method="POST">
            <label>SCAN QR CODE</label>
            <input style="font-size: 2rem; text-align: center;" type="text" name="qrs" id="qrs" placeholder="scan qrcode" class="form-control" readonly> <!--cmnt 27/04/22 TODO Error handling for empty inputbox also enlarge input box or remove from table form -->
            <br>
            <button class="w-100 btn btn-primary " type="submit">Submit</button>
          </form>
        </div> 
  </div>




</body>
<script src="java/signin.js" charset="utf-8"></script>
  <script>
      let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
      Instascan.Camera.getCameras().then(function(cameras){
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        }else{
          alert('No cameras found');
        }
      }).catch(function(e){
      console.error(e);
    });

    scanner.addListener('scan',function(c){
      document.getElementById('qrs').value=c;
      
    });

    </script>
</html>
