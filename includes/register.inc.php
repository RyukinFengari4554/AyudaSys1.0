
<?php
    include_once 'db.inc.php';
    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $barangay_id = $_POST['rbid'];
    $house_no  = $_POST['rhn'];
    $first_name = $_POST['rfn'];
    $middle_name = $_POST['rmn'];
    $last_name = $_POST['rln'];
    $no_of_members = $_POST['rnom'];
    $email = $_POST['re'];
    $contact_number = $_POST['rcn'];
    $street = $_POST['rs'];
    $barangay = $_POST['rb'];
    $v_s = "Verifying";
    $package = $_POST['rp'];
    $qr_code = generateRandomString();


    $sql = "insert into registration (barangay_id, house_no, first_name, middle_name, last_name, no_of_members, email, contact_number, street, barangay, verification_status, package, qr_code) values ('$barangay_id', '$house_no', '$first_name', '$middle_name', '$last_name', '$no_of_members', '$email', '$contact_number', '$street', '$barangay', '$v_s', '$package', '$qr_code');";
    $result = mysqli_query($conn, $sql);
    

    header("Location: ../registration.html?signup=success");
?>