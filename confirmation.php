<?php
session_start();
require_once "includes/dbh.inc.php";


$firstname = $_SESSION["FirstName"];
$middlename = $_SESSION["MiddleName"];
$lastname = $_SESSION["LastName"];
$type = $_SESSION["Type"];
$referencenumber = $_SESSION["reservation_id"];
$reservationdate = $_SESSION["reservation_date"];
$paymentType = $_SESSION["paymentType"];
$totalCost = $_SESSION["totalCost"];
$downPayment = $_SESSION["downPayment"];

if (isset($_SESSION['Adult']) && isset($_SESSION['Children']) && isset($_SESSION['SeniorPWD'])) {
  $Adult = $_SESSION["Adult"];
  $Children = $_SESSION["Children"];
  $SeniorPWD = $_SESSION["SeniorPWD"];
}
if ($type == "Room") {
  $paxNum = (int)$Adult + (int)$Children + (int)$SeniorPWD;
}
if ($type == "Event") {
  $eventPax = $_SESSION["EventPax"];
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/confirmation.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <section id="navBar" class="page-section active">
      <!-- start of nav -->
      <div class="nav" id="nav">
        <div class="site-nav">
          <div class="site-name" id="site-name">
            <img
              src="css/page-images/AmaroResort.png"
              alt="logo"
              class="logo"
            />
          </div>
          <div class="nav-bar" id="navbar">
            <a class="navBar" href="index.php"> Home </a>
            <a class="navBar" href="about.html"> About </a>
            <a class="navBar" href="services.html"> Services </a>
            <a class="navBar" href="reservation.html"> Reservation </a>
            <a class="navBar" href="contact.html"> Contact </a>
          </div>

          <a href="#" id="book-button">
            <button type="button" class="book-btn">Book Now</button>
          </a>

          <div class="vl"></div>

          <span><i class="fas fa-user" id="user"></i></span>
        </div>
      </div>
      <!-- end of nav -->
    </section>

    <!-- start of booking summary -->
    <section id="bookingSummary">
      <div class="summary-container">
        <span class="section-phrase">
          Reservation Complete! <br />
          We're excited to welcome you.
        </span>
        <div class="booking-summary-container">
          <div class="details-container">
            <div class="section-title"><h3>Transaction Details</h3></div>
            <!-- Reference Number -->
            <div class="section-details">
                <span>Reference Number:</span>
                <p><?php echo $referencenumber ?></p>
            </div>
            
            <!-- Guest Name -->
            <div class="section-details">
                <span>Guest Name:</span>
                <p><?php echo $firstname.' '.$middlename.' '.$lastname ?></p>
            </div>

            <!-- Reservation Type -->
            <div class="section-details">
              <span>Reservation Type:</span>
              <p><?php echo $type ?></p>
            </div>

            <!-- Reservation Date -->
            <div class="section-details">
              <span>Reservation Date:</span>
              <p><?php echo $reservationdate ?></p>
            </div>

            <!-- Pax Number -->
            <?php if($type == "Swimming"): ?>
              <!-- Adult-->
              <div class="section-details">
                <span>Adult:</span>
                <p><?php echo $Adult ?></p>
              </div>

              <!-- Children-->
              <div class="section-details">
                <span>Children:</span>
                <p><?php echo $Children ?></p>
              </div>

              <!-- Senior/PWD-->
              <div class="section-details">
                <span>Senior/PWD:</span>
                <p><?php echo $SeniorPWD ?></p>
              </div>

            <?php elseif($type == "Room"): ?>
            <div class="section-details">
              <span>Pax Number:</span>
              <p><?php echo $paxNum ?></p>
            </div>

            <?php else: ?>
              
            <div class="section-details">
              <span>Pax Number:</span>
              <p><?php echo $eventPax ?></p>
            </div>
            <?php endif; ?>

            <!-- Payment Method -->
            <div class="section-details">
              <span>Payment Method:</span>
              <p><?php echo $paymentType ?></p>
            </div>

            <!-- Total Cost -->
            <div class="section-details">
              <span>Total Cost:</span>
              <p><?php echo '₱' .$totalCost ?></p>
            </div>

            <!-- Total Cost -->
            <div class="section-details">
              <span>Down Payment:</span>
              <p><?php echo '₱' .$downPayment ?></p>
            </div>
          </div>

          <p> Present this to confirmation slip to the resort receptionist. <br> See you soon! </p>

          </div>
          <div class="cta-buttons">
            <a href="index.php" id="backToHome">
              <button type="button" class="secondary-btn">GO BACK</button>
            </a>
            <a href="reservation.html" id="addBooking">
              <button type="submit" class="primary-btn">
                ADD BOOKING
              </button>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end of booking summary -->
  </body>
</html>
