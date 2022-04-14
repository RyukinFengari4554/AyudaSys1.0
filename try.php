<?php
  include_once 'includes/connect_va.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <body>
    <?php
      $sql = "SELECT * FROM admin;";
      $result = mysqli_query($conn, $sql);
      $RC = mysqli_num_rows($result);
      if ($RC > 0 ){
        while($row = mysqli_fetch_assoc($result)){
          echo $row['password'];
        }
      }
    ?>
  </body>
</html>
