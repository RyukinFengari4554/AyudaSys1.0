<?php
    include_once 'db.inc.php';
    session_start();
    $qr_code_s=$_SESSION["qrcs"];
    
    $sql = "SELECT * FROM personal_information AS p INNER JOIN granted AS g ON p.barangay_id=g.barangay_id INNER JOIN ayuda_package as a ON g.package_no=a.package_no WHERE g.qr_code = '$qr_code_s';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){
        $row = mysqli_fetch_assoc($result);
        if ($row['distribution_status']==0){
            $sql = "UPDATE granted SET distribution_status = 1 WHERE qr_code = '$qr_code_s';";
            $result = mysqli_query($conn, $sql);
            header ('Location: ../index.html');
        }
        else{
            header ('Location: ../index.html');
        }


    }
    header ('Location: ../index.html');

    
