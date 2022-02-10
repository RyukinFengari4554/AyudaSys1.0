
<?php
    include_once 'db.inc.php';
    $barangay_id = $_POST['rbid'];
    $house_no  = $_POST['rhn'];
    $first_name = $_POST['rfn'];
    $middle_name = $_POST['rmn'];
    $last_name = $_POST['rln'];
    $no_of_members = $_POST['rnom'];
    $street = $_POST['rs'];
    $barangay = $_POST['rb'];



    $sql = "insert into personal_information (barangay_id, house_no, first_name, middle_name, last_name, no_of_members, street, barangay) values ('$barangay_id', '$house_no', '$first_name', '$middle_name', '$last_name', '$no_of_members', '$street', '$barangay');";
    $result = mysqli_query($conn, $sql);
    

    header("Location: ../register_citizen.html?register=success");
?>