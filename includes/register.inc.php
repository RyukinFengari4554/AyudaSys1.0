

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
    //getting FAMILY_CODE from PERSONAL TABLE
    $row = mysqli_fetch_assoc($result);
    $fam_code = $row['family_code'];

    if ($RC > 0 ){ // checking if inputted data are IN personal_info Table
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
    
    /* include QRBarCode class */
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
            //$sql = "insert into granted (qr_code, registration_no, granted_date, pick_up_date, barangay_id, family_code, package_no, distrbution_status) values ('$qr_code', '$reg_no', '$start_date', '$pud', '$barangay_id', '$fam_code','$package_no', '$distribution_status');";
            //$result = mysqli_query($conn, $sql);
            //header("Location: ../register_successfully.php");

            //header("Location: otp.php");
            //exit();
            //echo file_get_contents("otp.php");
            

            require_once 'otp.php';
            //COMMENTED MAY 6
            /*
            echo "
        <form action=‘verify.php’ accept-charset=‘UTF-8’ method=‘POST’>
            <div class=‘container’>
                <p style=‘color: white; text-align:center; font-size: 7.5rem;’>$contact_number </p>
                <p class=‘channel’ id=‘channel’ name=‘ch’ value=‘sms’ style=‘visibility: hidden’></p>
                <select class=‘select’ id=‘length’ name=‘l’ style=‘visibility: hidden’>
                    <option value=‘4’>4</option>
                    <option value=‘6’ selected>6</option>
                    <option value=‘8’>8</option>
                </select>
                <button name=‘button’ type=‘submit’>SEND SMS</button>
                <table class=‘center’ style=‘visibility: hidden’>
                <tr>
                  <td><select name=‘cc’ id=‘authy-countries’  data-show-as=‘text’></select></td>
                  <td><input type=‘tel’ id=‘phone_number’ placeholder=‘Phone Number’ name=‘pn’ maxlength=‘10’ value= $vcn></td>
                  
                </tr>
              </table>
            </div>
        </form>
          ";




        /* COMMENTED on 4/14/2022
        $sql = "insert into granted (qr_code, granted_date, pick_up_date, distrbution_status) values ('$qr_code', '$start_date', '$pud', '$distribution_status');";
        $result = mysqli_query($conn, $sql);
        header("Location: ../register_successfully.php");
        exit();
        */

        /*COMMENTED on 4/14/2022
            TODO:
                checking granted table if qrcode is presnt to that table if it is redirect to failure due to already registered
                insert INFO (from reg. table) -> granted table 

        */
        }
        else{
            header("Location: ../failed_registered_already.php");
        }
    }
    else{
        header("Location: ../failed_verification.php");
    }
?>
