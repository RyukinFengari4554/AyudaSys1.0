<?php
require 'includes/check_account.php';
session_start();
$account=Check($_SESSION['sun'],$_SESSION['sps']);

if(empty($_SESSION['sun']) || $account=="login-failed"){
  header("Location: signin.php");
  exit();
}

include 'includes/db.inc.php';

if($account=='admin'){
  // count Granted	Accounts
  $sql = "SELECT COUNT(DISTINCT barangay_id) AS total FROM granted;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rgra = $row["total"]; 
  // count registrants
  $sql = "SELECT COUNT(DISTINCT barangay_id) AS total FROM registration;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rreg = $row["total"];
  // count unregistered
  $sql = "SELECT COUNT(DISTINCT barangay_id) AS total FROM personal_information;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rureg = $row["total"] - $rgra;
  // count Distributed
  $sql = "SELECT COUNT(DISTINCT barangay_id) AS total FROM granted WHERE distribution_status = 1;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rdist = $row["total"];
  // count Undistributed
  $sql = "SELECT COUNT(DISTINCT barangay_id) AS total FROM granted WHERE distribution_status = 0;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rudist = $row["total"];
}
if($account=='barangay'){
  $sbv =$_SESSION['sb'];  
  // count Granted	Accounts
  $sql = "SELECT COUNT(DISTINCT g.barangay_id) AS total FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE p.barangay = '$sbv';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rgra = $row["total"]; 
  // count registrants
  $sql = "SELECT COUNT(DISTINCT barangay_id) AS total FROM registration WHERE barangay = '$sbv';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rreg = $row["total"];
  // count unregistered
  $sql = "SELECT COUNT(DISTINCT barangay_id) AS total FROM personal_information WHERE barangay = '$sbv';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rureg = $row["total"] - $rgra;
  // count Distributed
  $sql = "SELECT COUNT(DISTINCT g.barangay_id) AS total FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE g.distribution_status = 1 AND p.barangay = '$sbv';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rdist = $row["total"];
  // count Undistributed
  $sql = "SELECT COUNT(DISTINCT g.barangay_id) AS total FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE g.distribution_status = 0 AND p.barangay = '$sbv';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $rudist = $row["total"];
}
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
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
    <link href="styles/granted.css" rel="stylesheet">

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
.tprint{
  background-color: white;
}
table, th, td {
    border: 1px solid black;
  border-collapse: collapse;
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
      <h1 class="display-4">Granted Table Page</h1>
      <p class="lead">The Granted Table Page allows for monitoring of the Granted Table</p>
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
      <form action='granted_table.php' method='post'>
        <input type='text' name='search' placeholder='Search Database'/>
        <input type='submit' value='Search' />
      </form>
      <br>
      <form action='granted_table.php' method='post' style="color: #ADD8E6;
      font-family: 'Ubuntu', sans-serif;
      font-weight: 500; ">
      <fieldset id="group2">
          <p>Select Sorting:</p>
          <input type="radio" name="Ayuda_option" value="Granted Date">
          <label for="html">Granted Date</label>

          <input type="radio" name="Ayuda_option" value="first_name">
          <label for="css">Name</label>

          <input type="radio" name="Ayuda_option" value="barangay">
          <label for="javascript">Barangay</label>

          <input type="radio" name="Ayuda_option" value="barangay_id">
          <label for="javascript">Barangay Id</label>
          
          <input type="radio" name="Ayuda_option" value="family_code">
          <label for="javascript">Family Code</label>
      </fieldset>
      <fieldset id="group2">
          <p>Select Direction:</p>
          <input type="radio" name="Ayuda_option" value="ASC">
          <label for="html">Ascending</label>

          <input type="radio" name="Ayuda_option" value="DESC">
          <label for="javascript">Descending</label>
      </fieldset>
      <br>
      <fieldset id="group1">
          <p>Select Distribution Status:</p>
          <input type="radio" name="Ayuda_option" value="All">
          <label for="html">All</label>

          <input type="radio" name="Ayuda_option" value="1">
          <label for="css">Delivered</label>

          <input type="radio" name="Ayuda_option" value="0">
          <label for="javascript">Undelivered</label>
      </fieldset>
        <br><br>
          <input type="submit" value="Submit">
      </form>
    </div>
    
    <?php
          if (isset($_POST['search'])){
            $conn -> close();
            include 'includes/db.inc.php';
            $searchq = mysqli_real_escape_string($conn,$searchq = $_POST['search']);
          if($account=='admin'){
            $sql = "SELECT *, CONCAT(first_name,' ', last_name) FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE CONCAT(p.first_name,' ', p.last_name) LIKE '%$searchq%' OR p.barangay LIKE '%$searchq%' OR g.distribution_status LIKE '%$searchq%' ORDER BY g.granted_date ASC;";
          }
          else{
            $sbv =$_SESSION['sb'];
            $sql = "SELECT *, CONCAT(first_name,' ', last_name) FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE p.barangay = '$sbv' AND (CONCAT(p.first_name,' ', p.last_name) LIKE '%$searchq%' OR g.distribution_status LIKE '%$searchq%') ORDER BY g.granted_date ASC;";
          }
          echo "<div id='t1'>";
            $result = mysqli_query($conn, $sql);
            $RC = mysqli_num_rows($result);
            if ($RC > 0 ){
              echo "<div class='container'> <div class='card-deck  text-center'> ";
              while($row = mysqli_fetch_assoc($result)){
              echo "<div class='card lg-4  light-sm'>  <div class='card-header' >";
              echo "<p> Barangay ID: ".$row['barangay_id']." </p> " ;
              echo "</div> <div class='card-body text-center'>" ;
              echo "<p class='text-secondary'> Name: ".$row['first_name']." ".$row['last_name']." </p> " ;
              echo "<p class='text-secondary'> Barangay: ".$row['barangay']." </p> " ;
              echo "<p class='text-secondary'> QR code: ".$row['qr_code']." </p> " ;
              echo "<p class='text-secondary'> Granted Date: ". $row['granted_date']." </p> " ;
              echo "<p class='text-secondary'> Family code: ". $row['family_code']." </p> " ;
              echo "<p class='text-secondary'> Package No: ". $row['package_no']." </p> " ;
              if($row['distribution_status']==1){
                echo "<p class='text-secondary'> Distribution Status: DELIVERED </p> " ;
              }else{
                echo "<p class='text-secondary'> Distribution Status: UNDELIVERED </p> " ;
              }
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
              echo "<thead><tr ><th >qr_code</th>";
              echo "<th>Name</th>";
              echo "<th>Barangay</th>";
              echo "<th>granted_date</th>";
              echo "<th>barangay_id</th>";
              echo "<th>family_code</th>";
              echo "<th>package_no</th>";
              echo "<th>dist_status</th></tr></thead><tbody>";
              //echo "<br>";
              while($row = mysqli_fetch_assoc($result)){
                $counter=$counter+1;
                if ($counter%2==0) {
              echo "<tr class='active-row' ><td >".$row['qr_code']."</td>";
              echo "<td >". $row['first_name']. " ". $row['last_name']."</td>";
              echo "<td >". $row['barangay']. "</td>";
              echo "<td >". $row['granted_date']. "</td>";
              echo "<td >". $row['barangay_id']. "</td>";
              echo "<td >". $row['family_code']. "</td>";
              echo "<td >". $row['package_no']. "</td>";
              if($row['distribution_status']==1){
                echo "<td > DELIVERED </td></tr>";
              }else{
                echo "<td > UNDELIVERED </td></tr>";
              }
            }

              else{
                echo "<tr  ><td >".$row['qr_code']."</td>";
                echo "<td >". $row['first_name']. " ". $row['last_name']."</td>";
                echo "<td >". $row['barangay']. "</td>";
                echo "<td >". $row['granted_date']. "</td>";
                echo "<td >". $row['barangay_id']. "</td>";
                echo "<td >". $row['family_code']. "</td>";
                echo "<td >". $row['package_no']. "</td>";
                if($row['distribution_status']==1){
                  echo "<td > DELIVERED </td></tr>";
                }else{
                  echo "<td > UNDELIVERED </td></tr>";
                }
            }
            }
            echo "</tbody></table>";
            echo "<div><br></div>";
          }
            else{
              echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
            }
            echo "</div>";
        }else if (isset($_POST['Ayuda_option']) && ($_POST['Ayuda_option'] == 
        1 || $_POST['Ayuda_option'] == 0)){
          $rd=$_POST['Ayuda_option'];
          if($account=='admin'){
            $sql = "SELECT * FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE distribution_status = $rd ORDER BY g.granted_date ASC;";
          }
          else{
            $sbv =$_SESSION['sb'];
            $sql = "SELECT * FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE p.barangay = '$sbv' AND distribution_status = $rd ORDER BY g.granted_date ASC;";
          }
          echo "<div id='t1'>";
            $result = mysqli_query($conn, $sql);
            $RC = mysqli_num_rows($result);
            if ($RC > 0 ){
              echo "<div class='container'> <div class='card-deck  text-center'> ";
              while($row = mysqli_fetch_assoc($result)){
              echo "<div class='card lg-4  light-sm'>  <div class='card-header' >";
              echo "<p> Barangay ID: ".$row['barangay_id']." </p> " ;
              echo "</div> <div class='card-body text-center'>" ;
              echo "<p class='text-secondary'> Name: ".$row['first_name']." ".$row['last_name']." </p> " ;
              echo "<p class='text-secondary'> Barangay: ".$row['barangay']." </p> " ;
              echo "<p class='text-secondary'> QR code: ".$row['qr_code']." </p> " ;
              echo "<p class='text-secondary'> Granted Date: ". $row['granted_date']." </p> " ;
              echo "<p class='text-secondary'> Family code: ". $row['family_code']." </p> " ;
              echo "<p class='text-secondary'> Package No: ". $row['package_no']." </p> " ;
              if($row['distribution_status']==1){
                echo "<p class='text-secondary'> Distribution Status: DELIVERED </p> " ;
              }else{
                echo "<p class='text-secondary'> Distribution Status: UNDELIVERED </p> " ;
              }
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
              echo "<thead><tr ><th >qr_code</th>";
              echo "<th>Name</th>";
              echo "<th>Barangay</th>";
              echo "<th>granted_date</th>";
              echo "<th>barangay_id</th>";
              echo "<th>family_code</th>";
              echo "<th>package_no</th>";
              echo "<th>dist_status</th></tr></thead><tbody>";
              //echo "<br>";
              while($row = mysqli_fetch_assoc($result)){
                $counter=$counter+1;
                if ($counter%2==0) {
              echo "<tr class='active-row' ><td >".$row['qr_code']."</td>";
              echo "<td >". $row['first_name']. " ". $row['last_name']."</td>";
              echo "<td >". $row['barangay']. "</td>";
              echo "<td >". $row['granted_date']. "</td>";
              echo "<td >". $row['barangay_id']. "</td>";
              echo "<td >". $row['family_code']. "</td>";
              echo "<td >". $row['package_no']. "</td>";
              if($row['distribution_status']==1){
                echo "<td > DELIVERED </td></tr>";
              }else{
                echo "<td > UNDELIVERED </td></tr>";
              }
            }

              else{
                echo "<tr  ><td >".$row['qr_code']."</td>";
                echo "<td >". $row['first_name']. " ". $row['last_name']."</td>";
                echo "<td >". $row['barangay']. "</td>";
                echo "<td >". $row['granted_date']. "</td>";
                echo "<td >". $row['barangay_id']. "</td>";
                echo "<td >". $row['family_code']. "</td>";
                echo "<td >". $row['package_no']. "</td>";
                if($row['distribution_status']==1){
                  echo "<td > DELIVERED </td></tr>";
                }else{
                  echo "<td > UNDELIVERED </td></tr>";
                }
            }
            }
            echo "</tbody></table>";
            echo "<div><br></div>";
          }
            else{
              echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
            }
            echo "</div>";

        }
        else{
          if($account=='admin'){
            $sql = "SELECT * FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id ORDER BY g.granted_date ASC;";
          }
          else{
            $sbv =$_SESSION['sb'];
            $sql = "SELECT * FROM granted AS g INNER JOIN personal_information AS p ON g.barangay_id=p.barangay_id WHERE p.barangay = '$sbv' ORDER BY g.granted_date ASC;";
          }
          echo "<div id='t1'>";
            $result = mysqli_query($conn, $sql);
            $RC = mysqli_num_rows($result);
            if ($RC > 0 ){
              echo "<div class='container'> <div class='card-deck  text-center'> ";
              while($row = mysqli_fetch_assoc($result)){
              echo "<div class='card lg-4  light-sm'>  <div class='card-header' >";
              echo "<p> Barangay ID: ".$row['barangay_id']." </p> " ;
              echo "</div> <div class='card-body text-center'>" ;
              echo "<p class='text-secondary'> Name: ".$row['first_name']." ".$row['last_name']." </p> " ;
              echo "<p class='text-secondary'> Barangay: ".$row['barangay']." </p> " ;
              echo "<p class='text-secondary'> QR code: ".$row['qr_code']." </p> " ;
              echo "<p class='text-secondary'> Granted Date: ". $row['granted_date']." </p> " ;
              echo "<p class='text-secondary'> Family code: ". $row['family_code']." </p> " ;
              echo "<p class='text-secondary'> Package No: ". $row['package_no']." </p> " ;
              if($row['distribution_status']==1){
                echo "<p class='text-secondary'> Distribution Status: DELIVERED </p> " ;
              }else{
                echo "<p class='text-secondary'> Distribution Status: UNDELIVERED </p> " ;
              }
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
              echo "<thead><tr ><th >qr_code</th>";
              echo "<th>Name</th>";
              echo "<th>Barangay</th>";
              echo "<th>granted_date</th>";
              echo "<th>barangay_id</th>";
              echo "<th>family_code</th>";
              echo "<th>package_no</th>";
              echo "<th>dist_status</th></tr></thead><tbody>";
              //echo "<br>";
              while($row = mysqli_fetch_assoc($result)){
                $counter=$counter+1;
                if ($counter%2==0) {
              echo "<tr class='active-row' ><td >".$row['qr_code']."</td>";
              echo "<td >". $row['first_name']. " ". $row['last_name']."</td>";
              echo "<td >". $row['barangay']. "</td>";
              echo "<td >". $row['granted_date']. "</td>";
              echo "<td >". $row['barangay_id']. "</td>";
              echo "<td >". $row['family_code']. "</td>";
              echo "<td >". $row['package_no']. "</td>";
              if($row['distribution_status']==1){
                echo "<td > DELIVERED </td></tr>";
              }else{
                echo "<td > UNDELIVERED </td></tr>";
              }
            }

              else{
                echo "<tr  ><td >".$row['qr_code']."</td>";
                echo "<td >". $row['first_name']. " ". $row['last_name']."</td>";
                echo "<td >". $row['barangay']. "</td>";
                echo "<td >". $row['granted_date']. "</td>";
                echo "<td >". $row['barangay_id']. "</td>";
                echo "<td >". $row['family_code']. "</td>";
                echo "<td >". $row['package_no']. "</td>";
                if($row['distribution_status']==1){
                  echo "<td > DELIVERED </td></tr>";
                }else{
                  echo "<td > UNDELIVERED </td></tr>";
                }
            }
            }
            echo "</tbody></table>";
            echo "<div><br></div>";
          }
            else{
              echo "<center><h3 style='color: white;'>DATA NOT FOUND</h3></center>";
            }
            echo "</div>";
          }
    ?>

  </div>
  <div class="container">
      <div class="card-deck  text-center">
        <div class="card-sm  light-sm" style='margin:auto'>
        <button type="button" class="btn btn-lg btn-block btn-primary" onclick="printContent(id='t2')">Generate Report</button></a>
        </div>
      </div>
    </div>
  <br>
  <div class='container' > 
    <div class="card-deck  text-center ">
      <div class='card lg-4  light-sm' style="background-image: url('../images/bg4.jpg');">  
        <div class='card-header' ><p> AYUDA REPORT </p></div>
        <div class='card-body text-center'>
          <p class='text-secondary'> Registrants: <?php echo $rreg ?> </p>
          <p class='text-secondary'> Granted Accounts: <?php echo $rgra ?> </p>
          <p class='text-secondary'> Unregistered Accounts: <?php echo $rureg ?> </p>
          <p class='text-secondary'> Distributed Ayuda: <?php echo $rdist ?> </p>
          <p class='text-secondary'> Undistributed Ayuda: <?php echo $rudist ?> </p>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
      <div class="card-deck mt-5  text-center">
      <div class="card light-sm col-4" style='margin:auto; padding:0;'>
          <a href="monitor_database.php"><button type="button" id="d1"
              class="btn btn-lg btn-block btn-outline-primary">Return to Monitor Database</button></a>
        </div>
        <br>
        <div class="card  light-sm col-4" style='margin:auto;  padding:0;'>
          <a href="includes/home_check.php"><button type="button" id="d1"
              class="btn btn-lg btn-block btn-outline-primary">Return Home</button></a>
        </div>
      </div>
    </div>
    </div><p>&zwnj;</p>
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

        function printContent(el) {
          document.getElementById("t2").style.display = "block";
          //document.body.style.backgroundImage = "none";
          var restorepage = $('body').html();
          var printcontent = $('#' + el).clone();
          $('body').empty().html(printcontent);
          window.print();
          $('body').html(restorepage);
          document.getElementById("t1").style.display = "block";
          //document.body.style.backgroundImage = url("images/bg.jpg");
        }
      </script>

  </body>
</html>
