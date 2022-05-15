<?php
  include_once 'includes/db.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>AyudaSys Granted Table</title>

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
    <link href="styles/viewaccounts.CSS" rel="stylesheet">

</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand brand-title" href="">AyudaSys </a>
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
        </ul>
    </nav>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Granted Table Page</h1>
      <p class="lead">The Granted Table Page allows for monitoring of the Granted Table</p>
    </div>
    <div>
      <?php
      $sql = "SELECT * FROM granted;";
      $result = mysqli_query($conn, $sql);
      $RC = mysqli_num_rows($result);
      if ($RC > 0 ){
        echo "<table style='border: 1px solid white;'>";
        echo "<tr style='border: 1px solid white;'><th style='border: 1px solid white;'>qr_code</th>";
        echo "<th style='border: 1px solid white;'>registration_no</th>";
        echo "<th style='border: 1px solid white;'>granted_date</th>";
        echo "<th style='border: 1px solid white;'>pick_up_date</th>";
        echo "<th style='border: 1px solid white;'>barangay_id</th>";
        echo "<th style='border: 1px solid white;'>family_code</th>";
        echo "<th style='border: 1px solid white;'>package_no</th>";
        echo "<th style='border: 1px solid white;'>distribution_status</th></tr>";
        //echo "<br>";
        while($row = mysqli_fetch_assoc($result)){
        echo "<tr style='border: 1px solid white;'><td style='border: 1px solid white;'>".$row['qr_code']."</td>";
        echo "<td style='border: 1px solid white;'>". $row['registration_no']. "</td>";
        echo "<td style='border: 1px solid white;'>". $row['granted_date']. "</td>";
        echo "<td style='border: 1px solid white;'>". $row['pick_up_date']. "</td>";
        echo "<td style='border: 1px solid white;'>". $row['barangay_id']. "</td>";
        echo "<td style='border: 1px solid white;'>". $row['family_code']. "</td>";
        echo "<td style='border: 1px solid white;'>". $row['package_no']. "</td>";
        echo "<td style='border: 1px solid white;'>". $row['distribution_status']. "</td></tr>";
        //echo "<br>";
        }
        echo "</table>";
      }
      ?>
    </div>




  <script src="java/signin.js" charset="utf-8"></script>
  </body>
</html>
