
<?php
    include_once 'db.inc.php';
    $barangay_id = mysqli_real_escape_string($conn, $_POST['rbid']);
    $house_no  = mysqli_real_escape_string($conn, $_POST['rhn']);
    $first_name = mysqli_real_escape_string($conn, $_POST['rfn']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['rmn']);
    $last_name = mysqli_real_escape_string($conn, $_POST['rln']);
    $family_code = mysqli_real_escape_string($conn, $_POST['rfc']);
    $no_of_members = mysqli_real_escape_string($conn, $_POST['rnom']);
    $street = mysqli_real_escape_string($conn, $_POST['rs']);
    $barangay = mysqli_real_escape_string($conn, $_POST['rb']);
    $regby = mysqli_real_escape_string($conn, $_POST['rrb']);



    $sql = "SELECT * FROM personal_information WHERE barangay_id='$barangay_id';";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){ 
        header("Location: ../register_citizen.php?register=failed");
    }
    else{
    $sql = "INSERT INTO personal_information (barangay_id, house_no, first_name, middle_name, last_name, family_code, no_of_members, street, barangay, username) VALUES ('$barangay_id', '$house_no', '$first_name', '$middle_name', '$last_name', '$family_code', '$no_of_members', '$street', '$barangay', '$regby');";
    $result = mysqli_query($conn, $sql);
    header("Location: ../register_citizen.php?register=success");
    }
?>