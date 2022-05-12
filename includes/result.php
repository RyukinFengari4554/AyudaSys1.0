<?php
session_start();
include_once 'db.inc.php';
?>
<?php
if(isset($_POST['button1'])){
//input from the form
$otp_code=filter_input(INPUT_POST,'otp');
print_r($_SESSION);
$phone_number=$_SESSION["phonenumber"];

echo $phone_number;

//API URL
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();
$auth_id = getenv('AUTH_ID');
$secret_id=getenv('SECRET_ID');
$url = "https://api.tiniyo.com/v1/Account/".$auth_id."/VerificationsCheck";

//create a new cURL resource
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_VERBOSE, true);

//setup request to send json via POST
$data=array("code"=> $otp_code, "dst"=> $phone_number);

$payload = json_encode($data);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, "$auth_id:$secret_id");
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");


//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set HTTP Header for POST request
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$returns = curl_exec($ch);
// check the HTTP Status code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
switch ($httpCode) {
	case 200: 
		$resp = json_decode($returns);
		if ($resp->status) {
			//echo "Status: ".$resp->status." Message:".$resp->message."\n";
			if ( $resp->status == "success" ) {
				//echo "OTP VERIFIED\n";

				$qr_code=$_SESSION["qrc"];
            	$reg_no=$_SESSION["regn"];
				$start_date=$_SESSION["grd"];
				$pud=$_SESSION["piud"];
				$barangay_id=$_SESSION["baid"];
				$fam_code=$_SESSION["famc"];
				$package_no=$_SESSION["pano"];
				$distribution_status=$_SESSION["dist"];
				$sql = "insert into granted (qr_code, registration_no, granted_date, pick_up_date, barangay_id, family_code, package_no, distribution_status) values ('$qr_code', '$reg_no', '$start_date', '$pud', '$barangay_id', '$fam_code','$package_no', '$distribution_status');";
            	$result = mysqli_query($conn, $sql);
				header("Location: ../register_successfully.php");
			} else {
			//echo "OTP Verification Failed\n";
			header("Location: ../failed_verification.php");
			}	
		} else {
			//echo "OTP Verification Failed\n";
			header("Location: ../failed_verification.php");
		}
	break;
	default:
		echo 'Http Error: ' . $httpCode . ' : ' . curl_error($ch);
		header("Location: ../failed_verification.php");
	break;
}

//close cURL resource
curl_close($ch);
exit();
}
?>