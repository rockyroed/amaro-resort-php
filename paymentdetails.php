<?php
session_start();

if(isset($_POST["ppAdult"])) {

  $paymentAdult = $_POST['ppAdult'];
  $paymentChildren = $_POST['ppChildren'];
  

  $_SESSION["paymentAdult"] = $paymentAdult; 
  $_SESSION["paymentChildren"] = $paymentChildren;
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
          <span class="section-name">SWIMMING RESERVATION</span>
          <div class="form-container">
            <header>Payment Method</header>
            <p>Select your payment option.</p>

            <hr class="hz-line" />
            <!-- Form -->
            <form action="#" class="form" method="get">
              <div class="payment--options">
                <button name="paypal" type="button" title="PayPal">
                  <img
                    src="css/page-images/PayPal.png"
                    alt="logo"
                    class="logo"
                  />
                </button>
                <button name="gcash" type="button" title="GCash">
                  <img
                    src="css/page-images/GCash.png"
                    alt="logo"
                    class="logo"
                  />
                </button>
                <button name="mastercard" type="button" title="Mastercard">
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
          <div class="form-container">
            <header>
              <img src="css/page-images/PayPal.png" alt="logo" class="logo" />
            </header>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="#" class="form" method="post">
              <div class="column">
                <div class="input-box">
                  <!-- Adult -->
                  <label for="Adult">Adult</label>
                  <input
                    type="number"
                    id="adult"
                    title="Adult"
                    name="ppAdult"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- Children -->
                <div class="input-box">
                  <label for="Children">Children</label>
                  <input
                    type="number"
                    id="children"
                    title="Children"
                    name="ppChildren"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>
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
          <div class="form-container">
            <header>
              <img src="css/page-images/GCash.png" alt="logo" class="logo" />
            </header>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="#" class="form" method="get">
              <div class="column">
                <div class="input-box">
                  <!-- Adult -->
                  <label for="Adult">Adult</label>
                  <input
                    type="number"
                    id="adult"
                    title="Adult"
                    name="Adult"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- Children -->
                <div class="input-box">
                  <label for="Children">Children</label>
                  <input
                    type="number"
                    id="children"
                    title="Children"
                    name="Children"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>
              </div>

              <div class="cta-buttons">
                <a href="bookingdetails.html" id="cancelButton">
                  <button type="button" class="secondary-btn">BACK</button>
                </a>
                <!-- <a href="bookingsummary.html" id="confirm"> -->
                  <button type="button" class="primary-btn">
                    CONFIRM PAYMENT
                  </button>
                </a>
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of GCash Form -->

          <!-- Mastercard Form -->
          <div class="form-container">
            <header>
              <img
                src="css/page-images/mastercard.png"
                alt="logo"
                class="logo"
              />
            </header>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="#" class="form" method="get">
              <div class="input-box">
                <!-- Adult -->
                <label for="CardNumber">Card Number</label>
                <input
                  type="text"
                  id="cardNum"
                  title="Card Number"
                  name="Card Number"
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
                  name="Card Name"
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
              </div>

              <div class="cta-buttons">
                <a href="bookingdetails.html" id="cancelButton">
                  <button type="button" class="secondary-btn">BACK</button>
                </a>
                <a href="bookingsummary.html" id="confirm">
                  <button type="button" class="primary-btn">
                    CONFIRM PAYMENT
                  </button>
                </a>
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of Mastercard Form -->
        </div>
      </div>
    </section>
  </body>
</html>
