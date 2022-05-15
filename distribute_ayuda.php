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

    <title>AyudaSys Admin Signin</title>

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
    <link href="styles/viewaccounts.CSS" rel="stylesheet">


  
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
if(!empty($_POST['qrs'])){
    $qr_code_scanned = mysqli_real_escape_string($conn, $_POST['qrs']);
    $_SESSION["qrcs"]=$qr_code_scanned;
    $sql = "SELECT * FROM personal_information AS p INNER JOIN granted AS g ON p.barangay_id=g.barangay_id INNER JOIN ayuda_package as a ON g.package_no=a.package_no WHERE g.qr_code = '$qr_code_scanned';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){
      $row = mysqli_fetch_assoc($result);
      echo "<table style='border: 1px solid white;'>";
      echo "<tr style='border: 1px solid white;'><td style='border: 1px solid white;'>LAST NAME:</td>";
      echo "<td style='border: 1px solid white;'>".$row['last_name']. "</td></tr>";
      echo "<tr style='border: 1px solid white;'><td style='border: 1px solid white;'>BARANGAY ID:</td>";
      echo "<td style='border: 1px solid white;'>".$row['barangay_id']. "</td></tr>";
      echo "<tr style='border: 1px solid white;'><td style='border: 1px solid white;'>PACKAGE:</td>";
      echo "<td style='border: 1px solid white;'>".$row['package_content']. "</td></tr>";
      echo "<tr style='border: 1px solid white;'><td style='border: 1px solid white;'>NUMBER OF MEMBERS:</td>";
      echo "<td style='border: 1px solid white;'>".$row['no_of_members']. "</td></tr>";
      echo "<tr style='border: 1px solid white;'><td style='border: 1px solid white;'>GRANTED DATE:</td>";
      $newDate = date("Y-F-d", strtotime($row['granted_date']));
      echo "<td style='border: 1px solid white;'>".$newDate. "</td></tr>";
      echo "<tr style='border: 1px solid white;'><td style='border: 1px solid white;'>DISTRIBUTION STATUS:</td>";
      if($row['distribution_status']==1){
        echo "<td style='border: 1px solid white;'>DELIVERED</td></tr>";
      }
      else{
        echo "<td style='border: 1px solid white;'>UNDELIVERED</td></tr>";
      }
      echo "</table>";

      /*
      echo "<p>".$row['last_name']."</p>";
      echo "<p>".$row['barangay_id']."</p>";
      echo "<p>".$row['package_content']."</p>";
      echo "<p>".$row['granted_date']."</p>"; // not sure if included
      //echo "<p>".$row['distribution_status']."</p>"; // cmted april 27 2022  TODO gonna changed the granted table in the future with family_code
      echo "<p>".$row['distribution_status']; // TODO if ds=0 then echo UNDELIVERED else DELIVERED ALSO CHANGE THE COLOR & LAYOUT
    */

    }
    else{
      echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
    }
}
else{
    echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
}
?>



</div>
<div class="hello">
</div>
<div>

<!--COMMENTED ON MAY 5 TODO: IF ELSE BUTTON for UPDATE/DESTRIBUTE and else button for go back  -->

</div>

<br>
<form action="includes/update_distribute.php" method="POST" >
  <button class="w-100 btn btn-primary " type="submit">Confirm</button> <!-- PATRTIALLY COMPLETEDcmn 27/04/2022 TODO confirm button changes the distribution status to DELIVERED -->
</form>
</div>
    <script src="java/signin.js" charset="utf-8"></script>
  </body>
</html>
