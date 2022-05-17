<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>AyudaSys Home Page</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/pricing/">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap"
    rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
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

  <section id="title">
  </section>
  <!-- Custom styles for this template -->
  <link href="styles/index.css" rel="stylesheet">
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
  <section id="d1">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand brand-title" href="index.php">AyudaSys </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link links" href="registration.php">Registration</a>
          </li>
          <!--
      <li class="nav-item">
        <a class="nav-link links" href="distribute.php">Distribution</a>
      </li>
      commented on: May 15, 2022-->
          <li class="nav-item">
            <a class="nav-link links" href="signin.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">AyudaSys</h1>
      <p class="lead" id="d1">AyudaSys is a newly Digitalized Barangay Ayuda Management System used to assist barangay
        officials to gather the basic necessities of every household in their respective barangay.</p>
    </div>
    <div class="container">
      <div class="card-deck  text-center">
        <div class="card  light-sm">
          <a href="registration.php"><button type="button" id="d1"
              class="btn btn-lg btn-block btn-outline-primary">Registration</button></a>
        </div>
        <!--
      <div class="card  light-sm">
          <a href="distribute.php"><button type="button" class="btn btn-lg btn-block btn-outline-primary">Distribution Page</button></a>
      </div>
      commented on: May 15, 2022-->
        <div class="card  light-sm">
          <a href="signin.php"><button type="button" class="btn btn-lg btn-block btn-outline-primary">Login
              Page</button></a>
        </div>
      </div>
  </section>
  <section id="d2">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand brand-title" href="index.php">AyudaSys </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link links" href="registration.php">Pagpaparehistro</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link links" href="distribute.php">Distribution</a>
          </li>
          commented on: May 15, 2022-->
          <li class="nav-item">
            <a class="nav-link links" href="signin.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">AyudaSys</h1>
      <p class="lead">AyudaSys ay isang Makabagong Sistema na Namamahala sa Barangay Ayuda na ginagamit upang tulungan
        ang mga opisyal ng barangay na tipunin ang mga pangunahing pangangailangan ng bawat sambahayan sa kani-kanilang
        barangay.</p>
    </div>
    <div class="container">
      <div class="card-deck  text-center">
        <div class="card  light-sm">
          <a href="registration.php"><button type="button"
              class="btn btn-lg btn-block btn-outline-primary">Pagpaparehistro</button></a>
        </div>
        <!--
          <div class="card  light-sm">
              <a href="distribute.php"><button type="button" class="btn btn-lg btn-block btn-outline-primary">Distribution Page</button></a>
          </div>
          commented on: May 15, 2022-->
        <div class="card  light-sm">
          <a href="signin.php"><button type="button" class="btn btn-lg btn-block btn-outline-primary">Login
              Page</button></a>
        </div>
      </div>
  </section>




  <label class="switch">
    <input type="checkbox" id="myCheckbox" onchange="toggleCheck()" checked>
    <div class="slider round">
      <span language='filipino' class="off">FIL</span>
      <span language='english' class="on">ENG</span>
    </div>
  </label>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>


  <!--
<div id="google_translate_element"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

-->

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
  </script>
</body>

</html>