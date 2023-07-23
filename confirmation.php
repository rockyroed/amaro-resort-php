<?php
session_start();
  if(isset($_POST["FirstName"])) {
    $firstname = $_SESSION["FirstName"];
    $middlename = $_SESSION["MiddleName"];
    $lastname = $_SESSION["LastName"];
    $phonenumber = $_SESSION["PhoneNumber"];
    $emailaddress = $_SESSION["EmailAddress"];

    $dateofvisit = $_SESSION['dateofvisit'];
    $timeSlot = $_SESSION['timeSlot'];
    $Adult = $_SESSION['Adult'];
    $Children = $_SESSION['Children'];
    $SeniorPWD = $_SESSION['SeniorPWD'];
    $cottagetype = $_SESSION['cottagetype'];
    $notesroom = $_SESSION['notesroom'];
    $payment = $_SESSION['cottagetype'];
    $TotalCost = $_SESSION['TotalCost'];

    $paymentAdult = $_SESSION['ppAdult'];
    $paymentChildren = $_SESSION['ppChildren'];

    $date = date('m/d/y H:i:s');
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
          Confirm Reservation <br />
          Please check the details before proceeding.
        </span>
        <div class="booking-summary-container">
          <div class="details-container">
            <div class="section-title"><h3>Transaction Details</h3></div>

            <!-- Guest Name -->
            <div class="section-details">
                <span>Guest Name:</span>
                <p><?php echo $firstname.''.$middlename.''.$lastname ?></p>
            </div>

            <!-- Reservation Number -->
            <!-- <div class="section-details">
              <span>Reservation Number:</span>
              <p>RSVSWM230720XYZ</p>
            </div> -->

            <!-- Reservation Type -->
            <div class="section-details">
              <span>Reservation Type:</span>
              <p><?php echo $reservationtype ?></p>
            </div>

            <!-- Adult Pax -->
            <div class="section-details">
              <span>Adult Pax:</span>
              <p><?php echo $Adult ?></p>
            </div>

            <!-- Children Pax -->
            <div class="section-details">
              <span>Children Pax:</span>
              <p><?php echo $Children ?></p>
            </div>

            <!-- Senior/PWD Pax -->
            <div class="section-details">
              <span>Senior/PWD Pax:</span>
              <p><?php echo $SeniorPWD ?></p>
            </div>

            <!-- Reservation Date -->
            <div class="section-details">
              <span>Reservation Date:</span>
              <p><?php echo $date ?></p>
            </div>

            <!-- Payment Method -->
            <div class="section-details">
              <span>Payment Method:</span>
              <p><?php echo $paymentmethod ?></p>
            </div>

            <!-- Payment -->
            <div class="section-details">
              <span>Payment:</span>
              <p><?php echo $payment ?></p>
            </div>
          </div>

          <!-- <p> Present this to confirmation slip to the resort receptionist. <br> See you soon! </p> -->

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
