<?php
  session_start();
 
  function tp(){
    $v_qr=$_SESSION["vqr"];
    $command = escapeshellcmd('python3 print_qr_printer.py '.$v_qr);
    $output = exec($command);
    echo $output;
     /* works for prompting qrcode with session
    $v_qr=$_SESSION["vqr"];
    echo $v_qr;
    */
  }
  file_put_contents('qr.txt', $_SESSION["vqr"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>AyudaSys Register Successfully</title>
  <link rel="shortcut icon" href="images/logo2.ico">

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
    integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
  </script>
  <!--<script defer src="https://pyscript.net/alpha/pyscript.js"></script> -->

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap"
    rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Seymour+One&display=swap" rel="stylesheet">

  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Custom styles for this template -->
  <link href="styles/distribute.css" rel="stylesheet">
  <style>
    .switch {
      position: fixed;
      right: 0;
      bottom: 0;
      display: inline-block;
      width: 90px;
      height: 34px;
    }

    .switch input {
      display: none;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ca2222;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked+.slider {
      background-color: #2ab934;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(55px);
      -ms-transform: translateX(55px);
      transform: translateX(55px);
    }

    /*------ ADDED CSS ---------*/
    .on {
      display: none;
    }

    .on,
    .off {
      color: white;
      position: absolute;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      font-size: 10px;
      font-family: Verdana, sans-serif;
    }

    input:checked+.slider .on {
      display: block;
    }

    input:checked+.slider .off {
      display: none;
    }

    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand brand-title" href="index.php">AyudaSys </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link links" href="index.php">Home</a>
        </li>

      </ul>
  </nav>
  <section id='d1'>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center nprint">
        <h1 class="display-4">Sucessful Registration!</h1>
        <p class="lead">Please take a picture of the QR Code or Click the Download or Print Button. </p>
    </div>
    <div class='tprint' id='d1-print'>
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead"> This QR Code will serve as your Queue Number for Ayuda Distribution.</p>   
      </div>
      <div class="container qrcode">
        <div class="card-deck  text-center">
          <div class="card  light-sm">
            <?php
              echo "<center><img  position='center' class='qrcode' width='auto' src='includes/images/AyudaQR.png' alt='qrcode-img'></center>";
            ?>
          </div>
        </div>
      </div>
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Notice:</h1>
        <p class="lead">The ayuda will be distributed at 1 week's time.</p>
        <br>
        <br>

      </div>
    </div>
    <div>
      <a download="AyudaQR.png" href="./includes/images/AyudaQR.png" title="QR_Code"><button
          class="w-100 btn btn-primary "><i class="fa fa-download"></i>Download the QR code</button></a>
    </div>
    <br>
    <!--
    <div>
      <a download="qr.txt" href="qr.txt" title="QR_Code"><button
          class="w-100 btn btn-primary "><i class="fa fa-download"></i>Download the QR code</button></a>
    </div>
    <br>
  -->
    <div>
      <button class="w-100 btn btn-primary " onclick="printContent(id='d1-print')">Print</button>
    </div>
    <br>
    <a href="index.php"><button class="w-100 btn btn-primary " type="submit">Return Home</button></a>
    </div>
  </section>
  <section id='d2'>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center nprint">
        <h1 class="display-4">Nakompleto mo na ang Pagpaparehistro!</h1>
        <p class="lead">Mangyaring kumuha ng larawan ng QR Code o I-click ang I-Download o I-Print na Buton.</p>
    </div>
    <div class='tprint' id='d2-print'>
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <p class="lead">Ang QR Code ay magsisilbing numero mo sa pila para sa pamamahagi ng Ayuda.</p>
      </div>
      <div class="container qrcode">
        <div class="card-deck  text-center">
          <div class="card  light-sm">
            <?php
              echo "<center><img  position='center' class='qrcode' width='auto' src='includes/images/AyudaQR.png' alt='qrcode-img'></center>";
            ?>
          </div>
        </div>
      </div>
    
      <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Paalala:</h1>
        <p class="lead">Ipapamahagi ang ayuda sa sunod na linggo.</p>
        <br>
        <br>
      </div>
    </div>
    <div>
      <a download="AyudaQR.png" href="./includes/images/AyudaQR.png" title="QR_Code"><button
          class="w-100 btn btn-primary "><i class="fa fa-download"></i>I-download ang QR code</button></a>
    </div>
    <br>
    <!--
    <div>
      <a download="qr.txt" href="qr.txt" title="QR_Code"><button
          class="w-100 btn btn-primary "><i class="fa fa-download"></i>I-download ang QR code</button></a>
    </div>
    <br>
  -->
    <div>
      <button class="w-100 btn btn-primary " onclick="printContent(id='d2-print')">I-print</button>
    </div>
    <br>
    <a href="index.php"><button class="w-100 btn btn-primary " type="submit">Bumalik sa Home</button></a>
    </div>
  </section>


  <label class="switch">
    <input type="checkbox" id="myCheckbox" onchange="toggleCheck()" checked>
    <div class="slider round">
      <span language='filipino' class="off">FIL</span>
      <span language='english' class="on">ENG</span>
    </div>
  </label>


</body>
<script type="text/javascript">
  document.getElementById("d2").style.display = "none"; //hide fil
  function toggleCheck() {
    if (document.getElementById("myCheckbox").checked === true) {
      document.getElementById("d1").style.display = "block";
      document.getElementById("d2").style.display = "none";
    } else {
      document.getElementById("d1").style.display = "none";
      document.getElementById("d2").style.display = "block";
    }
  }

  function ctp() {
    alert("<?php tp(); ?>");
  }

  function printContent(el) {
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
    document.getElementById("d1").style.display = "block";
  }
</script>

</html>