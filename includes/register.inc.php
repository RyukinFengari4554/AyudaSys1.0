
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
    // GRANTING PROCESS:
    $vcn= substr($contact_number, 1); //VERYFING OTP NUMBER TESTING FOR PARSING
    $sql = "SELECT * FROM personal_information WHERE barangay_id = '$barangay_id' AND first_name = '$first_name' AND middle_name = '$middle_name' AND last_name = '$last_name' AND no_of_members = $no_of_members;";
    $result = mysqli_query($conn, $sql);
    $RC = mysqli_num_rows($result);
    if ($RC > 0 ){
        $v_s = "Granted";
        
    }
    else{
        $v_s = "Denied";
    }
    

    
    $sql = "insert into registration (barangay_id, house_no, first_name, middle_name, last_name, no_of_members, email, contact_number, street, barangay, verification_status, package, qr_code) values ('$barangay_id', '$house_no', '$first_name', '$middle_name', '$last_name', '$no_of_members', '$email', '$contact_number', '$street', '$barangay', '$v_s', '$package', '$qr_code');";
    $result = mysqli_query($conn, $sql);
    
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
    $start_date=date('d/m/y');
    $pud= date("d/m/y", strtotime("$start_date +1 week"));
    if ($RC > 0 ){
        if ($package=="Package A: Cash"){
            $package_no=1;
        }
        else{
            $package_no=2;
        }
        $distribution_status=false;
        //$sql = "insert into granted (qr_code, granted_date, pick_up_date, barangay_id, package_no, distrbution_status) values ('$qr_code', '$start_date', '$pud', '$barangay_id', '$package_no', '$distribution_status');";
        
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
        //gawa ng FAILED EIther one of your information is incorrect or you're not in the database.
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Phone Verification</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.min.css">
    </head>

    <body>
        <header class="site-home-header">
            <div class="outer site-header-background no-image">
                <div class="inner">
                    <div class="site-header-content">
                        <h1 class="site-title">
                            </h1>
                        <h2 class="site-description">Phone Verification OTP</h2>
                        </div>
                </div>
            </div>
        </header>
        <form action="verify.php" accept-charset="UTF-8" method="POST">
            <div class="container">
                <p style="color: white; text-align:center; font-size: 7.5rem;"><?php echo $contact_number;?> </p>
                <p class="channel" id="channel" name="ch" value="sms" style="visibility: hidden"></p>
                <select class="select" id="length" name="l" style="visibility: hidden">
                    <option value="4">4</option>
                    <option value="6" selected>6</option>
                    <option value="8">8</option>
                </select>
                <button name="button" type="submit">SEND SMS</button>
                <table class="center" style="visibility: hidden">
                <tr>
                  <td><select name="cc" id="authy-countries"  data-show-as="text"></select></td>
                  <td><input type="tel" id="phone_number" placeholder="Phone Number" name="pn" maxlength="10" value=<?php echo $vcn;?>></td>
                  <!--
                  <td><p type="tel" id="phone_number" name="pn" maxlength="10">
                      <?php //echo $vcn;
                      ?>
                      </p>
                      </td>
-->
                </tr>
              </table>
            </div>
        </form>
          <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.min.js"></script> -->
        <script src="newcountry.js" charset="utf-8"></script>
    </body>
</html>
