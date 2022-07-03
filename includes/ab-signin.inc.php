<?php
    include_once 'db.inc.php';
    $username = mysqli_real_escape_string($conn, $_POST['un']);
    $password  = mysqli_real_escape_string($conn, $_POST['ps']);
    session_start();
    $_SESSION["sun"]=$username;
    $_SESSION["sps"]=$password;
   
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){
        header("Location: ../adminpage.php");
        exit();      
    }
    else{
        $sql = "SELECT * FROM barangay_officials WHERE username='$username' AND password='$password';";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC > 0 ){
            header("Location: ../barangay.php");
            exit();
        }
        else{
            header("Location: ../signin.php?login=failed");
            $_SESSION['attempt'] =$_SESSION['attempt']+ 1;
            exit();
        }
    }

?>