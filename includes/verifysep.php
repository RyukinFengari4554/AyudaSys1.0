<?php
session_start();
?>
<?php
if(isset($_POST['button'])){
//input from the form
//$country_code=filter_input(INPUT_POST,'cc');
$phone_number=filter_input(INPUT_POST,'pn');
//$channel=filter_input(INPUT_POST,'ch');
//$length=filter_input(INPUT_POST,'l');

//API URL
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$apikey =getenv('apikey');
$url = 'https://api.semaphore.co/api/v4/otp';
//create a new cURL resource
$ch = curl_init();
$parameters = array(
    'apikey' => $apikey, //Your API KEY
    'number' => $phone_number,
    'message' => 'Your AyudaSys OTP code is {otp}',
    'sendername' => 'SEMAPHORE'
);
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_POST, 1 );

//Send the parameters set above with the request
curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

// Receive response from server
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );


$uregn=$_SESSION['regn'];
//execute the POST request
$returns = curl_exec($ch);



// check the HTTP Status code
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
switch ($httpCode) {
	case 200: 
		$resp = json_decode($returns);
        $_SESSION['mi']= $resp[0]->message_id;
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

//close cURL resource
curl_close($ch);
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
        <?php echo '<p style="color: white;">'.$output.'<p>'; ?>
        <form action="resultsep.php" accept-charset="UTF-8" method="POST" onSubmit="document.getElementById('myBtn').disabled=true;">
          <div class="container">
              <h2 class="site-description" style="color: white; font-size: 2rem;">Enter the OTP code:</h2>
              <input name="otp" placeholder="" type="text" style="font-size: 5rem; text-align: center;" required>
              <p></p><br>
              <p></p><br>
              <button name="button1" id="myBtn" type="submit">VERIFY</button>
            
          </div>
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.min.js"></script>
    </body>
</html>
