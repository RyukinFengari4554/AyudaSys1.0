<?php
    include_once 'db.inc.php';
    session_start();
    $username =$_SESSION["sun"];
    $password=$_SESSION["sps"];
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){
        header("Location: ../adminpage.html");
        exit();      
    }
    else{
        $sql = "SELECT * FROM barangay_officials WHERE username='$username' AND password='$password';";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC > 0 ){
            header("Location: ../barangay.html");
            exit();
        }
        else{
            header("Location: ../index.html");
            exit();
        }
    }

?>

