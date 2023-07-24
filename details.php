<?php
session_start();
require_once "includes/dbh.inc.php";

  if(isset($_GET['reservation_id'])){
    $reservation_id = $_GET['reservation_id'];
    $timeStamp = $_SESSION['reservation_date']; 
  }

  // Guest Details
  if (isset($_SESSION["FirstName"]) && isset($_SESSION["MiddleName"]) && isset($_SESSION["LastName"]) 
  && isset($_SESSION["PhoneNumber"]) && isset($_SESSION["EmailAddress"]) && isset($_SESSION["Type"])) {
      $firstname = $_SESSION["FirstName"];
      $middlename = $_SESSION["MiddleName"];
      $lastname = $_SESSION["LastName"];
      $phonenumber = $_SESSION["PhoneNumber"];
      $emailaddress = $_SESSION["EmailAddress"];
      $type = $_SESSION["Type"];
}


  // General Reservation Details
  if (isset($_SESSION["totalCost"]) && isset($_SESSION["downPayment"])) {
      $TotalCost = ($_SESSION["totalCost"]);
      $downpayment = ($_SESSION["downPayment"]);
      $totalcostNum = (int)$TotalCost;
      $downpaymentNum = (int)$downpayment;
}

  // Reservation Details for Swimming
  if (isset($_SESSION['DateOfVisit']) && isset($_SESSION['TimeSlot']) && isset($_SESSION['Adult']) 
  && isset($_SESSION['Children']) && isset($_SESSION['SeniorPWD']) && isset($_SESSION['CottageType'])){
    $dateofvisit = $_SESSION["DateOfVisit"];
    $timeSlot = $_SESSION["TimeSlot"];
    $Adult = $_SESSION["Adult"];
    $Children = $_SESSION["Children"];
    $SeniorPWD = $_SESSION["SeniorPWD"];
    $cottagetype = $_SESSION["CottageType"];
    $cottagetypename = "";

    if ($cottagetype == 1000) {
      $cottagetypename = "Canopy";
    }else if ($cottagetype == 1500) {
      $cottagetypename = "Trellis 1";
    }else if ($cottagetype == 2000) {
      $cottagetypename = "Trellis 2";
    }else if ($cottagetype == 1200) {
      $cottagetypename = "Kubo";
    }else if ($cottagetype == 7500) {
      $cottagetypename = "Pavilion 1";
    }else if ($cottagetype == 6500) {
      $cottagetypename = "Pavilion 2";
    }else if ($cottagetype == 9500) {
      $cottagetypename = "Pavilion 3";
    }
}
  // Reservation Details for Room
  if(isset($_SESSION['RoomType']) && isset($_SESSION['CheckIn']) 
    && isset($_SESSION['CheckOut'])){
    $roomtype = $_SESSION["RoomType"];
    $Adult = $_SESSION["Adult"];
    $Children = $_SESSION["Children"];
    $SeniorPWD = $_SESSION["SeniorPWD"];
    $paxNum = (int)$Adult + (int)$Children + (int)$SeniorPWD;
    $checkin = $_SESSION["CheckIn"];
    $checkout = $_SESSION["CheckOut"];
    $TotalCost = $_SESSION["totalCost"];
    $downpayment = $_SESSION["downPayment"];
    
}
  // Reservation Details for Events
  if(isset($_SESSION['EventDate']) && isset($_SESSION['EventPax']) && isset($_SESSION['VenueArea'])){
    $eventDate = $_SESSION['EventDate'];
    $eventPax = $_SESSION['EventPax'];
    $venueArea = $_SESSION['VenueArea'];
    $TotalCost = ($_SESSION["totalCost"]);
    $downpayment = ($_SESSION["downPayment"]);
    $totalcostNum = (int)$TotalCost;
    $downpaymentNum = (int)$downpayment;
}

  // General Payment Detail
  if (isset($_SESSION["paymentType"])) {
    $paymentType = $_SESSION["paymentType"];
    echo $paymentType;
  }
  
  
  // Payment Details for Paypal
  if (isset($_SESSION["paymentEmailadd"])) {
  $paymentEmailadd = $_SESSION["paymentEmailadd"];
}
  // Payment Details for GCash
  if(isset($_SESSION["paymentAccountname"]) && isset($_SESSION["paymentAccountnumber"])){
  $paymentAccountname = $_SESSION["paymentAccountname"];
  $paymentAccountnumber = $_SESSION["paymentAccountnumber"];
}
  // Payment Details for Credit Card
if(isset($_SESSION["paymentCardnumber"]) && isset($_SESSION["paymentCardname"]) && isset($_SESSION["mm"]) 
  && isset($_SESSION["YYYY"]) && isset($_SESSION["CVV"])){
  $paymentCardnumber = $_SESSION["paymentCardnumber"];
  $paymentCardname = $_SESSION["paymentCardname"];
  $mm = $_SESSION["mm"];
  $YYYY = $_SESSION["YYYY"];
  $CVV = $_SESSION["CVV"];
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/details.css" />
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

          <a href="reservation.html" id="book-button">
            <button type="button" class="book-btn">Book Now</button>
          </a>

          <div class="vl"></div>

          <span><i class="fas fa-user" id="user"></i></span>
        </div>
      </div>
      <!-- end of nav -->
    </section>

    <!-- start of Reservation summary -->
    <section id="bookingSummary">
      <div class="summary-container">
        <span class="section-phrase">View Details</span>
        <div class="booking-summary-container">
          <div class="details-container">
            <div class="section-title"><h3>Reservation</h3></div>
            <!-- Reservation Number -->
            <div class="section-details">
              <span>Reservation Number: </span>
              <p><?php echo $reservation_id ?></p>
            </div>

            <!-- Transaction Date -->
            <div class="section-details">
              <span>Transaction Date:</span>
              <p><?php echo $timeStamp ?></p>
            </div>
          </div>

          <div class="details-container">
            <div class="section-title"><h3>Guest Details</h3></div>
            <!-- First Name -->
            <div class="section-details">
              <span>First Name:</span>
              <p><?php echo $firstname ?></p>
            </div>

            <!-- Middle Name -->
            <div class="section-details">
              <span>Middle Name:</span>
              <p><?php echo $middlename ?></p>
            </div>

            <!-- Last Name -->
            <div class="section-details">
              <span>Last Name:</span>
              <p><?php echo $lastname ?></p>
            </div>

            <!-- Phone Number -->
            <div class="section-details">
              <span>Phone Number:</span>
              <p><?php echo $phonenumber ?></p>
            </div>

            <!-- Email Address -->
            <div class="section-details">
              <span>Email Address:</span>
              <p><?php echo $emailaddress ?></p>
            </div>
          </div>

          <div class="details-container">
            <div class="section-title"><h3>Reservation Details</h3></div>
            <?php if($type == "Swimming"): ?>
              <!-- Reservation Type-->
              <div class="section-details">
                <span>Reservation Type:</span>
                <p><?php echo $type ?></p>
              </div>

              <!-- Date of Visit:-->
              <div class="section-details">
                <span>Date of Visit:</span>
                <p><?php echo $dateofvisit ?></p>
              </div>

              <!-- Time Slot-->
              <div class="section-details">
                <span>Time Slot:</span>
                <p><?php echo $timeSlot ?></p>
              </div>

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

              <!-- Cottage Type -->
              <div class="section-details">
                <span>Cottage Type:</span>
                <p><?php echo $cottagetypename ?></p>
              </div>
            <?php elseif($type == "Room"): ?>
              <!-- Reservation Type-->
              <div class="section-details">
                <span>Reservation Type:</span>
                <p><?php echo $type ?></p>
              </div>

              <!-- Check-in:-->
              <div class="section-details">
                <span>Check In Date:</span>
                <p><?php echo $checkin ?></p>
              </div>

              <!-- Check-out:-->
              <div class="section-details">
                <span>Check Out Date:</span>
                <p><?php echo $checkout ?></p>
              </div>

              <!-- Room Type-->
              <div class="section-details">
                <span>Room Type:</span>
                <p><?php echo $roomtype ?></p>
              </div>

              <!-- Pax Number-->
              <div class="section-details">
                <span>Pax Number:</span>
                <p><?php echo $paxNum ?></p>
              </div>
            <?php else: ?>
              <!-- Reservation Type-->
              <div class="section-details">
                <span>Reservation Type:</span>
                <p><?php echo $type ?></p>
              </div>

              <!-- Venue Area:-->
              <div class="section-details">
                <span>Venue Area:</span>
                <p><?php echo $venueArea ?></p>
              </div>

              <!-- Time Slot-->
              <div class="section-details">
                <span>Pax Number:</span>
                <p><?php echo $eventPax ?></p>
              </div>

              <!-- Adult-->
              <div class="section-details">
                <span>Event Date:</span>
                <p><?php echo $eventDate ?></p>
              </div>
            <?php endif; ?>
        
          <div class="details-container">
            <div class="section-title"><h3>Payment Details</h3></div>
              <?php if($paymentType == "paypal"): ?>
                <?php  echo $paymentType; ?>
                <!-- Payment Method -->
                <div class="section-details">
                  <span>Payment Method:</span>
                  <p><?php echo ucfirst($paymentType) ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>Email Address:</span>
                  <p><?php echo $paymentEmailadd ?></p>
                </div>

              <?php elseif($paymentType == "gcash"): ?>
                <!-- Payment Method -->
                <div class="section-details">
                  <span>Payment Method:</span>
                  <p><?php echo ucfirst($paymentType) ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>Account Name:</span>
                  <p><?php echo $paymentAccountname ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>Account Number:</span>
                  <p><?php echo $paymentAccountnumber ?></p>
                </div>
              <?php else: ?>
                <!-- Payment Method -->
                <div class="section-details">
                  <span>Payment Method:</span>
                  <p><?php echo ucfirst($paymentType) ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>Card Number:</span>
                  <p><?php echo $paymentCardnumber ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>Cardholder's Holder:</span>
                  <p><?php echo $paymentCardname ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>Expiration Date:</span>
                  <p><?php echo $mm . '-' . $YYYY ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>CVV: </span>
                  <p><?php echo $CVV ?></p>
                </div>
              <?php endif; ?>
              </div>
          </div>

          <div class="details-container">
            <div class="section-title"><h3>Amount</h3></div>

            <!-- Total Cost -->
            <div class="section-details">
              <span>Total Cost:</span>
              <p><?php echo '₱' .$totalcostNum ?></p>
            </div>

            <!-- Downpayment -->
            <div class="section-details">
              <span>Down Payment:</span>
              <p><?php echo '₱' .$downpaymentNum ?></p>
            </div>
        </div>
      </div>
    </section>
    <!-- end of booking summary -->
  </body>
</html>
