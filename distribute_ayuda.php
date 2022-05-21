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

    <title>AyudaSys DIstribute Ayuda</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">
    <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>


    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">


  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Custom styles for this template -->
    <link href="styles/card.css" rel="stylesheet">
    <link href="styles/adminpage.css" rel="stylesheet">



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
    </div>
  </nav>

  </head>
  <body>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Ayuda Package Distribution</h1>
  <p class="lead">Information! <br>
</div>

  </div>
</div>
<div>
<?php
if(!empty($_POST['qrs']) || isset($_SESSION["qrcs"])){
  if(empty($_POST['qrs'])){
    $qr_code_scanned=$_SESSION["qrcs"];
  }
  else{
    $qr_code_scanned = mysqli_real_escape_string($conn, $_POST['qrs']);
    $_SESSION["qrcs"]=$qr_code_scanned;

  }
    $sql = "SELECT * FROM personal_information AS p INNER JOIN granted AS g ON p.barangay_id=g.barangay_id INNER JOIN ayuda_package as a ON g.package_no=a.package_no INNER JOIN registration as r ON g.registration_no=r.registration_no WHERE g.qr_code = '$qr_code_scanned';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){
      $row = mysqli_fetch_assoc($result);
      $contact_number = $row['contact_number'];
      $vcn= substr($contact_number, 1);
      $_SESSION["cns"]=$contact_number;
      $_SESSION["vcns"]=$vcn;
      echo "<div class='container'> <div class='card-deck  text-center'> ";
      echo "<div class='card lg-4  light-sm'>  <div class='card-header' >";
      echo "<p> BARANGAY ID: ".$row['barangay_id']." </p> " ;
      echo "</div> <div class='card-body text-center'>" ;
      echo "<p class='primary'> LAST NAME:  ".$row['last_name']. "</p>  " ;
      echo "<p class='text-secondary'> PACKAGE: ".$row['package_content']." </p> " ;
      echo "<p class='text-secondary'> NUMBER OF MEMBERS: ".$row['no_of_members']." </p> " ;
      $newDate = date("Y-F-d", strtotime($row['granted_date']));
      echo "<p class='text-secondary'> GRANTED DATE: ".$newDate." </p> " ;
      if($row['distribution_status']==1){
        echo "<p class='text-secondary'>DISTRIBUTION STATUS: DELIVERED</p>";
        echo "</div></div></div></div><br><br>";
        echo "<a href='distribute.php'> <button class='w-100 btn btn-primary' type='submit'>Return to QR Code Scanning</button></a>";
      }
      else{
        echo "<p class='text-secondary'>DISTRIBUTION STATUS: UNDELIVERED</p>";
        echo "</div></div></div></div><br><br>";
        echo "<a href='includes/otp.php'><button class='w-100 btn btn-primary' type='submit'>Distribute (with OTP confirmation)</button></a>";
        echo "<div><br></div>";
        echo "<a href='distribute.php'> <button class='w-100 btn btn-primary' type='submit'>Return to QR Code Scanning</button></a>";

      }

    }
    else{
      echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
      echo "<div><br></div>";
      echo "<a href='distribute.php'> <button class='w-100 btn btn-primary' type='submit'>Return to QR Code Scanning</button></a>";

    }
}
else{
    echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
    echo "<div><br></div>";
    echo "<a href='distribute.php'> <button class='w-100 btn btn-primary' type='submit'>Return to QR Code Scanning</button></a>";

}
?>



</div>
<div class="hello">
</div>
<div>

<!--COMMENTED ON MAY 5 TODO: IF ELSE BUTTON for UPDATE/DESTRIBUTE and else button for go back  -->

</div>

<br>

<!--
<form action="includes/update_distribute.php" method="POST" >
  <button class="w-100 btn btn-primary " type="submit">Confirm</button>  PATRTIALLY COMPLETEDcmn 27/04/2022 TODO confirm button changes the distribution status to DELIVERED
</form>
-->
</div>
</body>
</html>
