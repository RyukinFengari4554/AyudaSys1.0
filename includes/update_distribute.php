<?php
    include_once 'db.inc.php';
    $vcn= substr($contact_number, 1);
    $sql = "UPDATE granted SET distribution_status = REPLACE(distribution_status,0,1) WHERE distribution_status = 0;";
    $result = mysqli_query($conn, $sql);
    header ('../index.html');

