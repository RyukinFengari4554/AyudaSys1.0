

<?php
    session_start();
    include_once 'db.inc.php';
    //require_once 'newcountry.js';
   // require_once 'style.css';
    //require_once 'verify.php';
    //require_once 'result.php';
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $barangay_id = mysqli_real_escape_string($conn, $_POST['rbid']);
    $house_no  = mysqli_real_escape_string($conn, $_POST['rhn']);
    $first_name = mysqli_real_escape_string($conn, $_POST['rfn']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['rmn']);
    $last_name = mysqli_real_escape_string($conn, $_POST['rln']);
    $no_of_members = mysqli_real_escape_string($conn, $_POST['rnom']);
    $email = mysqli_real_escape_string($conn, $_POST['re']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['rcn']);
    $street = mysqli_real_escape_string($conn, $_POST['rs']);
    $barangay = mysqli_real_escape_string($conn, $_POST['rb']);
    $package = mysqli_real_escape_string($conn, $_POST['rp']);
    $qr_code = generateRandomString();
    // GRANTING PART 1:
    $vcn= substr($contact_number, 1); //VERYFING OTP NUMBER TESTING FOR PARSING
    $sql = "SELECT * FROM personal_information WHERE barangay_id = '$barangay_id' AND first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND no_of_members = $no_of_members;";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    
    
    if ($RC > 0 ){ 
        //getting FAMILY_CODE from PERSONAL TABLE
        $row = mysqli_fetch_assoc($result);
        $fam_code = $row['family_code'];
        // checking if inputted data are IN personal_info Table
        $sql = "SELECT * FROM granted WHERE family_code = '$fam_code';";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC == 0 ){ // checking if inputted data are IN granted Table
            $v_s = "Granted";
            
            /*
            $start_date=date('y/m/d');
            $pud= date("y/m/d", strtotime("$start_date +1 week"));
            */
            $start_date=date('Y/m/d');
            //$sd = $_POST['start_date'];
            $pud = date('Y/m/d',strtotime('+1 week'));
        }
        else{
            $v_s = "Denied";
        }
    }
    else{
        $v_s = "Denied";
    }
    
    //INSERTING DATA INTO REGISTRATION TABLE
    $sql = "insert into registration (barangay_id, house_no, first_name, middle_name, last_name, no_of_members, email, contact_number, street, barangay, verification_status, package, qr_code) values ('$barangay_id', '$house_no', '$first_name', '$middle_name', '$last_name', '$no_of_members', '$email', '$contact_number', '$street', '$barangay', '$v_s', '$package', '$qr_code');";
    $result = mysqli_query($conn, $sql);
    
    //getting REGISTATION_NO from REGISTRATION TABLE
    $sql = "SELECT * FROM registration WHERE qr_code = '$qr_code';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $reg_no = $row['registration_no'];
    
    
    //GRANTING PART 2:
    $sql = "SELECT * FROM personal_information WHERE barangay_id = '$barangay_id' AND first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND no_of_members = $no_of_members;";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){ // checking if inputted data are IN personal_info Table
        $sql = "SELECT * FROM granted WHERE family_code = '$fam_code';";
        $result = mysqli_query($conn, $sql);
        $RC = mysqli_num_rows($result);
        if ($RC == 0 ){ // checking if inputted data are IN granted Table
            if ($package=="Package A: Cash" ||$package=="Pakete A: Pera"){
                $package_no=1;
            }
            else{
                $package_no=2;
            }
            $distribution_status=false;
            $_SESSION["qrc"]=$qr_code;
            $_SESSION["regn"]=$reg_no;
            $_SESSION["grd"]=$start_date;
            $_SESSION["piud"]=$pud;
            $_SESSION["baid"]=$barangay_id;
            $_SESSION["famc"]=$fam_code;
            $_SESSION["pano"]=$package_no;
            $_SESSION["dist"]=$distribution_status;
            include "QRBarCode.php";
            $qr = new QRBarCode();
            /* create text QR code  */
            $qr->text($qr_code);
            /* display QR code image */
             $qr->qrCode(250, 'images/AyudaQR');
    
            class QR{
                public function returnQR(){
                    return $this->qr_code;
                }
            }
            require_once 'otp.php';
            /* include QRBarCode class */
        
            
        }
        else{
            header("Location: ../failed_registered_already.php");
        }
    }
    else{
        header("Location: ../failed_verification.php");
    }
?>
