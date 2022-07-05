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

    <title>AyudaSys Monitor Registry</title>
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
<style>


* {
  font-family: sans-serif;
  color: #0000000;
}

.content-table {
  border-collapse: collapse;
  margin: auto;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  background-color: white;


}
table{
  color: black;
}


.content-table thead tr {
  background-color: #009879;
  color: violet;
  text-align: left;
  font-weight: bold;

}

.content-table th,
.content-table td {
  padding: 12px 15px;
  color: black;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
  color: black;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

.active-row  td {
    font-weight: bold;
    color: #009879;
}



</style>

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
        </ul>
    </nav>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Monitor Registry Page</h1>
      <p class="lead">The Monitor Registry Page allows for monitoring of the database list </p>
      <p style="color: #ADD8E6;
      font-family: 'Ubuntu', sans-serif;
      font-weight: 500; ">View Database as: </p>
      <select onchange="viewdb()" name="view" class="custom-select d-block w-100" id="vd" required>
        <option selected="selected">Tiles</option>
        <option >Table</option>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </select>
      <br>
      <form action='monitor_registry.php' method='post'>
        <input type='text' name='search' placeholder='Search Database'/>
        <input type='submit' value='Search' />
      </form>
    </div>

<?php
    if (isset($_POST['search'])){
      $conn -> close();
      include 'includes/db.inc.php';
      $searchq = mysqli_real_escape_string($conn,$searchq = $_POST['search']);
      if($account=='admin'){
          $sql = "SELECT *, CONCAT(first_name,' ', last_name) FROM registration WHERE barangay_id LIKE '%$searchq%' OR CONCAT(first_name,' ', last_name) LIKE '%$searchq%' OR barangay LIKE '%$searchq%' OR verification_status LIKE '%$searchq%' OR qr_code LIKE '%$searchq%' ORDER BY barangay_id ASC;";
      }
      else{
          $sbv =$_SESSION['sb'];
          $sql = "SELECT *, CONCAT(first_name,' ', last_name) FROM registration WHERE barangay = '$sbv' AND (barangay_id LIKE '%$searchq%' OR CONCAT(first_name,' ', last_name) LIKE '%$searchq%' OR verification_status LIKE '%$searchq%' OR qr_code LIKE '%$searchq%') ORDER BY barangay_id ASC;";
      }
      echo "<div id='t1'>";
      $result = mysqli_query($conn, $sql) or die(mysql_error());
      $RC = mysqli_num_rows($result);
      if ($RC > 0 ){
        echo "<div class='container'> <div class='card-deck  text-center'> ";
          while($row = mysqli_fetch_assoc($result)){
          echo "<div class='card lg-4  light-sm'>  <div class='card-header' >";
          echo "<p> Barangay ID: ".$row['barangay_id']." </p> " ;
          echo "</div> <div class='card-body text-center'>" ;
          echo "<p class='primary'> Name: ". $row['first_name']. " ".$row['last_name']. "</p>  " ;
          echo "<p class='text-secondary'> Barangay: ".$row['barangay']." </p> " ;
          echo "<p class='text-secondary'> Verification Status: ".$row['verification_status']." </p> " ;
          echo "<p class='text-secondary'> QR Code: ".$row['qr_code']." </p> " ;
          echo "</div> </div>";
          }
          echo "</div>";
          echo "</div>";
          echo "<div><br></div>";
        }
        else{
          echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
        }
        echo "</div>";
        echo "<div id='t2'>";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC > 0 ){
          $counter=0;
          echo "<table class='content-table'>";
          echo "<thead><tr ><th >barangay_id</th>";
          echo "<th>first_name</th>";
          echo "<th>last_name</th>";
          echo "<th>barangay</th>";
          echo "<th>verification_status</th>";
          echo "<th>qr_code</th></tr></thead><tbody>";
          while($row = mysqli_fetch_assoc($result)){
            $counter=$counter+1;
            if ($counter%2==0) {
            echo "<tr class='active-row' ><td>".$row['barangay_id']."</td>";
            echo "<td>". $row['first_name']. "</td>";
            echo "<td>". $row['last_name']. "</td>";
            echo "<td>". $row['barangay']. "</td>";
            echo "<td>". $row['verification_status']. "</td>";
            echo "<td>". $row['qr_code']. "</td></tr>";
          }
          else {
            echo "<tr><td>".$row['barangay_id']."</td>";
            echo "<td>". $row['first_name']. "</td>";
            echo "<td>". $row['last_name']. "</td>";
            echo "<td>". $row['barangay']. "</td>";
            echo "<td>". $row['verification_status']. "</td>";
            echo "<td>". $row['qr_code']. "</td></tr>";
            }

          //echo "<br>";
          }
          echo "</tbody></table>";
          echo "<div><br></div>";
        }
        else{
          echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
        }
        echo '</div>';
      
      }else{
        if($account=='admin'){
          $sql = "SELECT * FROM registration;";
        }
        else{
          $sbv =$_SESSION['sb'];
          $sql = "SELECT * FROM registration WHERE barangay = '$sbv';";
        }
        echo "<div id='t1'>";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC > 0 ){
          echo "<div class='container'> <div class='card-deck  text-center'> ";
          //echo "<br>";
          while($row = mysqli_fetch_assoc($result)){
          echo "<div class='card lg-4  light-sm'>  <div class='card-header' >";
          echo "<p> Barangay ID: ".$row['barangay_id']." </p> " ;
          echo "</div> <div class='card-body text-center'>" ;
          echo "<p class='primary'> Name: ". $row['first_name']. " ".$row['last_name']. "</p>  " ;
          echo "<p class='text-secondary'> Barangay: ".$row['barangay']." </p> " ;
          echo "<p class='text-secondary'> Verification Status: ".$row['verification_status']." </p> " ;
          echo "<p class='text-secondary'> QR Code: ".$row['qr_code']." </p> " ;
          echo "</div> </div>";


          //echo "<br>";
          }
          echo "</div>";
          echo "</div>";
          echo "<div><br></div>";
        }
        else{
          echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
        }
        
        echo "</div>";
        if($account=='admin'){
          $sql = "SELECT * FROM registration;";
        }
        else{
          $sbv =$_SESSION['sb'];
          $sql = "SELECT * FROM registration WHERE barangay = '$sbv';";
        }
        echo "<div id='t2'>";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC > 0 ){
          $counter=0;
          echo "<table class='content-table'>";
          echo "<thead><tr ><th >barangay_id</th>";
          echo "<th>first_name</th>";
          echo "<th>last_name</th>";
          echo "<th>barangay</th>";
          echo "<th>verification_status</th>";
          echo "<th>qr_code</th></tr></thead><tbody>";
          //echo "<br>";
          while($row = mysqli_fetch_assoc($result)){
            $counter=$counter+1;
            if ($counter%2==0) {
            echo "<tr class='active-row' ><td>".$row['barangay_id']."</td>";
            echo "<td>". $row['first_name']. "</td>";
            echo "<td>". $row['last_name']. "</td>";
            echo "<td>". $row['barangay']. "</td>";
            echo "<td>". $row['verification_status']. "</td>";
            echo "<td>". $row['qr_code']. "</td></tr>";
          }
          else {
            echo "<tr><td>".$row['barangay_id']."</td>";
            echo "<td>". $row['first_name']. "</td>";
            echo "<td>". $row['last_name']. "</td>";
            echo "<td>". $row['barangay']. "</td>";
            echo "<td>". $row['verification_status']. "</td>";
            echo "<td>". $row['qr_code']. "</td></tr>";
            }

          //echo "<br>";
          }
          echo "</tbody></table>";
          echo "<div><br></div>";
        }
        else{
          echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
        }
        echo '</div>';
    }
      ?>
      <br>
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
    <script type="text/javascript">
      document.getElementById("t2").style.display = "none"; //hide fil
      function viewdb() {
        if (document.getElementById("vd").value === "Tiles" ) {
          document.getElementById("t1").style.display = "block";
          document.getElementById("t2").style.display = "none";
        } else {
          document.getElementById("t1").style.display = "none";
          document.getElementById("t2").style.display = "block";
        }
      }
    </script>



  </body>
</html>
