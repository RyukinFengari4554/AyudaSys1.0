<?php
    //include_once 'db.inc.php';
    //include 'register.inc.php';
    
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