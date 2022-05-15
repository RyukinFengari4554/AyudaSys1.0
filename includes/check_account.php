<?php
function Check($username,$password){
    include_once 'db.inc.php';
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){
        return "admin";
    }
    else{
        $sql = "SELECT * FROM barangay_officials WHERE username='$username' AND password='$password';";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC > 0 ){
            return "barangay";
        }
        else{
            return "login-failed";
        }
    }
}