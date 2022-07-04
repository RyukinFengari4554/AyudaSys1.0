<!doctype html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>AyudaSys Registration</title>
  <link rel="shortcut icon" href="images/logo2.ico">

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/checkout/">

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
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@700&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,300;1,400&family=Ubuntu:wght@300;400;500;700&display=swap"
    rel="stylesheet">

  <section id="title">
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
            <a class="nav-link links" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link links" href="signin.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>



  <!-- Custom styles for this template -->
  <link href="styles/registration.css" rel="stylesheet">
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

<body class="bg-light">
  <section id="d1">

    <div class="container">
      <div class="py-5 text-center">

        <h2>Registration Page</h2>
        <p class="lead">Properly Input the correct Data for the Ayuda System.</p>
      </div>

    </div>
    <!-- Custom styles for this template -->
    <form class="form1" action="includes/register.inc.php" method="POST" onSubmit="document.getElementById('myBtn1').disabled=true;">
      <div class="row">
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Barangay ID: </label>
          <input type="text" class="form-control" name="rbid" id="rbid" placeholder="Enter your Barangay ID" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> First Name: </label>
          <input type="text" class="form-control" name="rfn" id="rfn" placeholder="Enter your First Name" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Middle Name: </label>
          <input type="text" class="form-control" name="rmn" id="rmn" placeholder="Enter your Middle Name" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Last Name: </label>
          <input type="text" class="form-control" name="rln" id="rln" placeholder="Enter your Last Name" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Number of People in your Residence: </label>
          <input type="number" class="form-control no-spinner" name="rnom" id="rnom" pattern="/^-?\d+\.?\d*$/"
            onKeyPress="if(this.value.length==2) return false;"
            placeholder="Enter the number of people in your Residence" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Barangay: </label>
          <input type="text" class="form-control" name="rb" id="rb" placeholder="Enter your Barangay" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> House No: </label>
          <input type="text" class="form-control" name="rhn" id="rhn" placeholder="Enter your House Number" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Street: </label>
          <input type="text" class="form-control" name="rs" id="rs" placeholder="Enter your Street Name" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4 col-sm-12 was-validated">
          <label> Ayuda Package: </label>
          <select name="rp" class="custom-select d-block w-100" id="Package" required>
            <option value="">Package...</option>
            <option>Package A: Cash</option>
            <option>Package B: Goods</option>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </select>
          <!--<input type="text" class="form-control" name="rp" id="rp" placeholder="Choose your Ayuda package" name="email">-->
        </div>
        <div class="col-md-4 col-sm-12 was-validated">
          <label> Email: </label>
          <input type="email" class="form-control" name="re" id="re" placeholder="Enter your Email" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
        <div class="col-md-4 col-sm-12 was-validated">
          <label> Contact Number: (Format: 09XXXXXXXXX) </label>
          <!--<input type="number" class="form-control no-spinner" name="rcn" name="rcn" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" placeholder="Enter your Contact Number" required> commented on: may 15, 2022-->
          <input type="tel" class="form-control" id="phone" name="rcn" name="rcn"
            placeholder="Enter your Contact Number" pattern="[0][9][0-9]{9}" required>
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Please fill out this field.</div>
        </div>
      </div>
      <br>
      <br>
      <button class="w-99 btn btn-primary " id='myBtn1' type="submit">Submit Information</button>

    </form>
  </section>
  <section id="d2">
    <div class="container">
      <div class="py-5 text-center">
        <h2>Pahina ng Pagpaparehistro</h2>
        <p class="lead">Wastong ipasok ang tamang impormasyon para sa Sistema ng Ayuda.</p>
      </div>
    </div>
    <!-- Custom styles for this template -->
    <form class="form1" action="includes/register.inc.php" method="POST" onSubmit="document.getElementById('myBtn2').disabled=true;">
      <div class="row">
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Barangay ID: </label>
          <input type="text" class="form-control" name="rbid" id="rbid" placeholder="Ilagay ang iyong Barangay ID" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Unang Pangalan: </label>
          <input type="text" class="form-control" name="rfn" id="rfn" placeholder="Ilagay ang iyong Unang Pangalan" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Gitnang Pangalan: </label>
          <input type="text" class="form-control" name="rmn" id="rmn" placeholder="Ilagay ang iyong Gitnang Pangalan" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Apelyido: </label>
          <input type="text" class="form-control" name="rln" id="rln" placeholder="Ilagay ang iyong Apelyido" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Bilang ng mga Tao sa iyong Tirahan: </label>
          <input type="number" class="form-control no-spinner" name="rnom" id="rnom" pattern="/^-?\d+\.?\d*$/"
            onKeyPress="if(this.value.length==2) return false;"
            placeholder="Ilagay ang Bilang ng mga Tao sa iyong Tirahan:" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Barangay: </label>
          <input type="text" class="form-control" name="rb" id="rb" placeholder="Ilagay ang iyong Barangay" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Numero ng Bahay: </label>
          <input type="text" class="form-control" name="rhn" id="rhn" placeholder="Ilagay ang numero ng inyong bahay" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
        <div class="col-md-3 col-sm-12 was-validated">
          <label> Kalye: </label>
          <input type="text" class="form-control" name="rs" id="rs" placeholder="Ilagay ang pangalan ng inyong kalye" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4 col-sm-12 was-validated">
          <label> Pakete ng Ayuda: </label>
          <select name="rp" class="custom-select d-block w-100" id="Package" required>
            <option value="">Pakete...</option>
            <option>Pakete A: Pera</option>
            <option>Package B: Pagkain at Gamit</option>
            <div class="valid-feedback">Wasto.</div>
            <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
          </select>
          <!--<input type="text" class="form-control" name="rp" id="rp" placeholder="Choose your Ayuda package" name="email">-->
        </div>
        <div class="col-md-4 col-sm-12 was-validated">
          <label> Sulatroniko: </label>
          <input type="email" class="form-control" name="re" id="re" placeholder="Ilagay ang iyong Sulatroniko" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
        <div class="col-md-4 col-sm-12 was-validated">
          <label>  Numero sa Pakikipag-ugnayan: (Pormat: 09XXXXXXXXX) </label>
          <!--<input type="number" class="form-control no-spinner" name="rcn" name="rcn" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" placeholder="Enter your Contact Number" required> commented on: may 15, 2022-->
          <input type="tel" class="form-control" id="phone" name="rcn" name="rcn"
            placeholder="Ilagay ang iyong Numero sa Pakikipag-ugnayan" pattern="[0][9][0-9]{9}" required>
          <div class="valid-feedback">Wasto.</div>
          <div class="invalid-feedback">Mangyaring punan ang patlang na ito.</div>
        </div>
      </div>
      <br>
      <br>
      <button class="w-99 btn btn-primary " id='myBtn2' type="submit">Magsumite ng Impormasyon</button>

    </form>
  </section>
  <label class="switch">
    <input type="checkbox" id="myCheckbox" onchange="toggleCheck()" checked>
    <div class="slider round">
      <span language='filipino' class="off">FIL</span>
      <span language='english' class="on">ENG</span>
    </div>
  </label>
</body>
<br>
    <a href="index.php"><button class="w-99 btn btn-primary " type="submit" id="btns">Return Home</button></a>
  <br>
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
