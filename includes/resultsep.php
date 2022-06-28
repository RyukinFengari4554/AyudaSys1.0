<?php
session_start();
include_once 'db.inc.php';
?>
<?php

//input from the form
$otp_code=filter_input(INPUT_POST,'otp');
print_r($_SESSION);
$phone_number=$_SESSION["phonenumber"];

echo $phone_number;
$mi=$_SESSION['mi'];
//API URL
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$apikey =getenv('apikey');
//create a new cURL resource
$ch = curl_init();
$parameters = array(
    'apikey' => $apikey //Your API KEY
);
$data = http_build_query($parameters);
$url='https://api.semaphore.co/api/v4/messages/'.$mi."?".$data;
curl_setopt( $ch, CURLOPT_URL,$url);

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

$uregn=$_SESSION['regn'];
//execute the POST request
$returns = curl_exec($ch);

echo $returns.'\n';
$resp = json_decode($returns);
echo $resp[0]->code;
// check the HTTP Status code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
/*
switch ($httpCode) {
	case 200: 
		$resp = json_decode($returns);
		if ($resp[0]->code == $otp_code) {
			//echo "Status: ".$resp->status." Message:".$resp->message."\n";
			
			//echo "OTP VERIFIED\n";
				
			//try otp for distribution COMMENTED ON MAY 15, 2021 
			//try isset for admin/B.O. (qrcs qrcode-scanned) rekta distribute
			//else isset for qr_code rekta distribute
			//add failed_distribution due to wrong OTP entered.

			if(isset($_SESSION["qrcs"])){
					$qr_code_scanned=$_SESSION["qrcs"];
					$sql = "UPDATE granted SET distribution_status = 1 WHERE qr_code = '$qr_code_scanned';";
            		$result = mysqli_query($conn, $sql);
					//unset($_SESSION["qrcs"]);
					header("Location: ../distribute_ayuda.php");
			}
			else{
					$qr_code=$_SESSION["qrc"];
            		$reg_no=$_SESSION["regn"];
					$start_date=$_SESSION["grd"];
					$pud=$_SESSION["piud"];
					$barangay_id=$_SESSION["baid"];
					$fam_code=$_SESSION["famc"];
					$package_no=$_SESSION["pano"];
					$distribution_status=$_SESSION["dist"];
					$_SESSION["vqr"]=$qr_code;
					$sql = "insert into granted (qr_code, registration_no, granted_date, pick_up_date, barangay_id, family_code, package_no, distribution_status) values ('$qr_code', '$reg_no', '$start_date', '$pud', '$barangay_id', '$fam_code','$package_no', '$distribution_status');";
            		$result = mysqli_query($conn, $sql);
					header("Location: ../register_successfully.php");
			}
				
		} else {
			//echo "OTP Verification Failed\n";
			if(isset($_SESSION["qrcs"])){
				header("Location: ../failed_distribution.php");
			}
			else{
				$sql = "UPDATE registration SET verification_status = 'Denied' WHERE registration_no = '$uregn';";
                $result = mysqli_query($conn, $sql);
				header("Location: ../failed_verification.php");
			}
		}
	break;
	default:
		echo 'Http Error: ' . $httpCode . ' : ' . curl_error($ch);
		if(isset($_SESSION["qrcs"])){
            header("Location: ../failed_distribution.php");
        }
        else{
			$sql = "UPDATE registration SET verification_status = 'Denied' WHERE registration_no = '$uregn';";
            $result = mysqli_query($conn, $sql);
        	header("Location: ../failed_verification.php");
        }
	break;
}
*/
//close cURL resource
curl_close($ch);
exit();

?>