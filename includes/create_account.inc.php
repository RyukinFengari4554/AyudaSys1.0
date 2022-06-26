<?php
    include_once 'db.inc.php';
    $user_n = mysqli_real_escape_string($conn, $_POST['boun']);
    $pas  = mysqli_real_escape_string($conn, $_POST['bops']);
    $brngy  = mysqli_real_escape_string($conn, $_POST['bob']);
    


    $sql = "SELECT * FROM admin WHERE username='$user_n';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if($RC > 0){
        header("Location: ../create_barangay_official_accout.php?creation=failed");
    }
    else{
    $sql = "SELECT * FROM barangay_officials WHERE username='$user_n';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){ 
        header("Location: ../create_barangay_official_accout.php?creation=failed");
    }
    else{
        $sql = "INSERT INTO barangay_officials (username, password, barangay) VALUES ('$user_n', '$pas', '$brngy');";
        $result = mysqli_query($conn, $sql);
        header("Location: ../create_barangay_official_accout.php?creation=success");
    }
}
?>