<?php
session_start();

$type = $_SESSION["Type"];

$type = strtoupper($type);

  if (isset($_POST["paymentCardnumber"]) && isset($_POST["paymentCardname"])
  && isset($_POST["mm"]) && isset($_POST["YYYY"]) && isset($_POST["CVV"]) && isset($_POST["paymentType"])){

    $paymentCardnumber = $_POST['paymentCardnumber'];
    $paymentCardname = $_POST['paymentCardname'];
    $mm = $_POST['mm'];
    $YYYY = $_POST['YYYY'];
    $CVV = $_POST['CVV'];
    $paymentType = $_POST['paymentType'];

    $_SESSION["paymentCardnumber"] = $paymentCardnumber;
    $_SESSION["paymentCardname"] = $paymentCardname;
    $_SESSION["mm"] = $mm;
    $_SESSION["YYYY"] = $YYYY;
    $_SESSION["CVV"] = $CVV;
    $_SESSION["paymentType"] = $paymentType;
    header("Location: bookingsummary.php"); die();

} else if(isset($_POST["paymentAccountname"]) && isset($_POST["paymentAccountnumber"]) 
  && isset($_POST["paymentType"])){

    $paymentAccountname = $_POST['paymentAccountname'];
    $paymentAccountnumber = $_POST['paymentAccountnumber'];
    $paymentType = $_POST['paymentType'];

    $_SESSION["paymentAccountname"] = $paymentAccountname;
    $_SESSION["paymentAccountnumber"] = $paymentAccountnumber;
    $_SESSION["paymentType"] = $paymentType;
    header("Location: bookingsummary.php"); die();
}
  else if(isset($_POST["paymentEmailadd"]) && isset($_POST["paymentType"])) {

    $paymentEmailadd = $_POST['paymentEmailadd'];
    $paymentType = $_POST['paymentType'];

    $_SESSION["paymentEmailadd"] = $paymentEmailadd;
    $_SESSION["paymentType"] = $paymentType;
    header("Location: bookingsummary.php"); die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/paymentdetails.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <section id="reservation">
      <div class="right-book">
        <div class="right-container">
          <img src="images/AmaroResort.png" alt="logo" class="logo" />
          <span class="section-name"><?php echo $type.' '.'RESERVATION'?></span>
          <div class="form-container">
            <header>Payment Method</header>
            <p>Select your payment option.</p>

            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
              <div class="payment--options">
                <button class="payment" name="paypal" type="button" title="PayPal">
                  <img
                    src="css/page-images/PayPal.png"
                    alt="logo"
                    class="logo"
                  />
                </button>
                <button class="payment" name="gcash" type="button" title="GCash">
                  <img
                    src="css/page-images/GCash.png"
                    alt="logo"
                    class="logo"
                  />
                </button>
                <button class="payment" name="mastercard" type="button" title="Mastercard">
                  <img
                    src="css/page-images/mastercard.png"
                    alt="logo"
                    class="logo"
                  />
                </button>
              </div>
            </form>
            <!-- End of Form -->
          </div>

          <!-- Paypal Form -->
          <div class="form-container payment-details hidden">
            <header>
              <img src="css/page-images/PayPal.png" alt="logo" class="logo" />
            </header>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
              <div class="column">
                <div class="input-box">
                  <!-- Email Address -->
                  <label for="email">Email Address</label>
                  <input
                    type="email"
                    id="email-address"
                    title="emailadd"
                    name="paymentEmailadd"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder=""
                    required
                  />
                </div>
                <input class="hidden" name="paymentType" id="paymentType"></input>
              </div>

             

              <div class="cta-buttons">
                <a href="bookingdetails.html" id="cancelButton">
                  <button type="button" class="secondary-btn">BACK</button>
                </a>
                <!-- <a href="bookingsummary.php" id="confirm"> -->
                  <button class="primary-btn">
                    CONFIRM PAYMENT
                  </button>
                </a>
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of Paypal Form -->

          <!-- Gcash Form -->
          <div class="form-container payment-details hidden">
            <header>
              <img src="css/page-images/GCash.png" alt="logo" class="logo" />
            </header>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
              <div class="column">
                <div class="input-box">
                  <!-- Account Name -->
                  <label for="accountname">Account Name</label>
                  <input
                    type="text"
                    id="account-name"
                    title="Account Name"
                    name="paymentAccountname"
                    value=""
                    size="40"
                    maxlength="100"
                    placeholder=""
                    required
                  />
                </div>

                <!-- Account Number -->
                <div class="input-box">
                  <label for="accountnumber">Account Number</label>
                  <input
                    type="number"
                    id="account-number"
                    title="AccountNumber"
                    name="paymentAccountnumber"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>
                <input class="hidden" name="paymentType" id="paymentType"></input>
              </div>

              <div class="cta-buttons">
                <a href="bookingdetails.html" id="cancelButton">
                  <button type="button" class="secondary-btn">BACK</button>
                </a>
                <!-- <a href="bookingsummary.html" id="confirm"> -->
                  <button class="primary-btn">
                    CONFIRM PAYMENT
                  </button>
                <!-- </a> -->
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of GCash Form -->

          <!-- Mastercard Form -->
          <div class="form-container payment-details hidden">
            <header>
              <img
                src="css/page-images/mastercard.png"
                alt="logo"
                class="logo"
              />
            </header>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
              <div class="input-box">
                <!-- Adult -->
                <label for="CardNumber">Card Number</label>
                <input
                  type="text"
                  id="cardNum"
                  title="Card Number"
                  name="paymentCardnumber"
                  value=""
                  size="40"
                  maxlength="50"
                  placeholder="0"
                  required
                />
              </div>

              <div class="input-box">
                <!-- Cardholder's Name -->
                <label for="CardNumber">Cardholder's Name</label>
                <input
                  type="text"
                  id="cardName"
                  title="Card Name"
                  name="paymentCardname"
                  value=""
                  size="40"
                  maxlength="50"
                  placeholder="0"
                  required
                />
              </div>

              <div class="column">
                <div class="input-box">
                  <!-- MM -->
                  <label for="MM">MM</label>
                  <input
                    type="number"
                    id="mm"
                    title="MM"
                    name="mm"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <div class="input-box">
                  <!-- YYYY -->
                  <label for="YYYY">YYYY</label>
                  <input
                    type="number"
                    id="yyyy"
                    title="YYYY"
                    name="YYYY"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- CVV -->
                <div class="input-box">
                  <label for="CVV">CVV</label>
                  <input
                    type="number"
                    id="cvv"
                    title="CVV"
                    name="CVV"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>
                <input class="hidden" name="paymentType" id="paymentType"></input>
              </div>

              <div class="cta-buttons">
                <a href="bookingdetails.html" id="cancelButton">
                  <button type="button" class="secondary-btn">BACK</button>
                </a>
                <!-- <a href="bookingsummary.html" id="confirm"> -->
                  <button class="primary-btn">
                    CONFIRM PAYMENT
                  </button>
                <!-- </a> -->
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of Mastercard Form -->
        </div>
      </div>
    </section>
    <script type="module" src="./javascript/paymentdetails.js"></script>
  </body>
</html>
