<?php
    include_once 'db.inc.php';
    $user_n = mysqli_real_escape_string($conn, $_POST['boun']);
    $pas  = mysqli_real_escape_string($conn, $_POST['bops']);
    $brngy  = mysqli_real_escape_string($conn, $_POST['bob']);
    



    $sql = "insert into barangay_officials (username, password, barangay) values ('$user_n', '$pas', '$brngy');";
    $result = mysqli_query($conn, $sql);
    

    header("Location: ../create_barangay_official_accout.php?creation=success");
?>