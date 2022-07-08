<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>AyudaSys Failed Registered Already</title>
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


  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap"
    rel="stylesheet">


  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Custom styles for this template -->
  <link href="styles/adminpage.css" rel="stylesheet">
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
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Already Registered!</h1>
      <p class="lead">You or a family member has already registered! <br>
    </div>
    <div class="hello">
    </div>
    <div class="hello">
    </div>
    <div>
      <a href="registration.php"><button class="w-100 btn btn-primary " type="submit">Return to
          Registration</button></a>
    </div>
    <br>
    <a href="index.php"><button class="w-100 btn btn-primary " type="submit">Return Home</button></a>
    </div>

  </section>
  <section id='d2'>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Nakarehistro na!</h1>
      <p class="lead">Ikaw o isang miyembro ng pamilya mo ay nakapag-rehistro na! <br>
    </div>
    <div class="hello">
    </div>
    <div class="hello">
    </div>
    <div>
      <a href="registration.php"><button class="w-100 btn btn-primary " type="submit">Bumalik sa Pagpaparehistro</button></a>
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
</script>

</html>
