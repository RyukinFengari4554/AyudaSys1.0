<?php
require 'includes/check_account.php';
session_start();
$account=Check($_SESSION['sun'],$_SESSION['sps']);
if(empty($_SESSION['sun']) || $account=="login-failed" || $account=="barangay"){
  header("Location: signin.php");
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>AyudaSys Creation of Barangay Official Account</title>
  

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/checkout/">

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
    integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
  </script>
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap"
    rel="stylesheet">

  <section id="title">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand brand-title" href="index.php">AyudaSys </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
  <link href="styles/registration.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container">
    <div class="py-5 text-center">

      <h2>Creation of Barangay Official Account</h2>
      <p id='he' class="lead">Properly Input the correct Data for a Barangay Official Account.</p>
      <?php
      $fulUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if (strpos($fulUrl,"create_barangay_official_accout.php?creation=success") == true){
                    echo "<center><h2 style='color: green;margin: auto;'> Account Successfully Created</h2></center>";
                  };
                  if (strpos($fulUrl,"create_barangay_official_accout.php?creation=failed") == true){
                    echo "<center><h2 style='color: red;margin: auto;'> Account Creation Failed</h2></center>";
                  };
                  if (strpos($fulUrl,"password=wrong") == true){
                    echo "<center><h2 style='color: red;margin: auto;'> Account Creation Failed! Wrong Password</h2></center>";
                  };
      ?>
    </div>

  </div>
  <!-- Custom styles for this template -->
  <form class="form1" id="form1" action="includes/create_account.inc.php" method="POST" onSubmit="document.getElementById('myBtn1').disabled=true;">
    <div>
      <div class="row was-validated" style="padding-right: 1rem; padding-left: 1em;">
        <label>Username: </label>
        <input type="text" class="form-control" name="boun" id="boun" placeholder="Enter Username" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <br>
      <div class="row was-validated" style="padding-right: 1rem; padding-left: 1rem;">
        <label>Password: </label>
        <input type="text" class="form-control" name="bops" id="bops" placeholder="Enter Password" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <br>
      <div class="row was-validated" style="padding-right: 1rem; padding-left: 1rem;">
        <label>Barangay: </label>
        <input type="text" class="form-control" name="bob" id="bob" placeholder="Enter Barangay" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
    </div>
    <br>
    
    <br>
    <button class="w-100 btn btn-primary " id="myBtn" type="submit" hidden>Submit</button>
  
  </form>
  <button class="w-100 btn btn-primary " id="myBtn1" onclick="myFunction();">Create</button>
  <p> </p>
<a href="includes/home_check.php"><button class="w-100 btn btn-primary " type="submit" id="btns">Return Home</button></a>
<p>&zwnj;</p>

<script type="text/javascript">

function myFunction() {
  if((document.getElementById('boun').innerHTML != "" && document.getElementById('bops').innerHTML != "") && document.getElementById('bob').innerHTML != "" ){
    var spass = "<?php echo $_SESSION['sps'];?>";
    let person = prompt("Please enter your password", "Password");
    if (person == spass) {
      //alert('SUCCESS');
      document.getElementById("form1").submit();
    }
    else{
      //alert('FAILED');
      window.location.replace("create_barangay_official_accout.php?password=wrong");
    }
  }
  else if ((document.getElementById('boun').innerHTML == "" || document.getElementById('bops').innerHTML == "") || document.getElementById('bob').innerHTML == "" ){
    document.getElementById("form1").submit();
  }
}
</script>
</body>
</html>
