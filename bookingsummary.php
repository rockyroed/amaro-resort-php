<?php
session_start();
  // Guest Details

if (isset($_SESSION['FirstName']) && isset($_SESSION['MiddleName']) && isset($_SESSION['LastName']) 
&& isset($_SESSION['PhoneNumber']) && isset($_SESSION['EmailAddress']) && isset($_SESSION['Type']) 
&& isset($_SESSION['totalCost']) && isset($_SESSION['downPayment']) && isset($_SESSION['DateOfVisit']) 
&& isset($_SESSION['TimeSlot']) && isset($_SESSION['Adult']) && isset($_SESSION['Children']) 
&& isset($_SESSION['SeniorPWD']) && isset($_SESSION['CottageType']) && isset($_SESSION['RoomType']) 
&& isset($_SESSION['CheckIn']) && isset($_SESSION['CheckOut']) && isset($_SESSION['EventDate']) 
&& isset($_SESSION['EventPax']) && isset($_SESSION['VenueArea']) && isset($_SESSION['paymentType']) 
&& isset($_SESSION['paymentEmailadd']) && isset($_SESSION['paymentAccountname']) 
&& isset($_SESSION['paymentAccountnumber']) && isset($_SESSION['paymentCardnumber']) 
&& isset($_SESSION['paymentCardname']) && isset($_SESSION['mm']) 
&& isset($_SESSION['YYYY']) && isset($_SESSION['CVV'])) {
  $firstname = $_SESSION["FirstName"];
  $middlename = $_SESSION["MiddleName"];
  $lastname = $_SESSION["LastName"];
  $phonenumber = $_SESSION["PhoneNumber"];
  $emailaddress = $_SESSION["EmailAddress"];
  $type = $_SESSION["Type"];

  // General Reservation Details
  $TotalCost = $_SESSION["totalCost"];
  $downpayment = $_SESSION["downPayment"];

  // Reservation Details for Swimming
  $dateofvisit = $_SESSION["DateOfVisit"];
  $timeSlot = $_SESSION["TimeSlot"];
  $Adult = $_SESSION["Adult"];
  $Children = $_SESSION["Children"];
  $SeniorPWD = $_SESSION["SeniorPWD"];
  $cottagetype = $_SESSION["CottageType"];
  

  // Reservation Details for Room
  $roomtype = $_SESSION["RoomType"];
  $checkin = $_SESSION["CheckIn"];
  $checkout = $_SESSION["CheckOut"];

  // Reservation Details for Events
  $eventDate = $_SESSION['EventDate'];
  $eventPax = $_SESSION['EventPax'];
  $venueArea = $_SESSION['VenueArea'];




  // Payment Details for Paypal
  $paymentType = $_SESSION["paymentType"];
  $paymentEmailadd = $_SESSION["paymentEmailadd"];

  // Payment Details for GCash
  $paymentAccountname = $_SESSION["paymentAccountname"];
  $paymentAccountnumber = $_SESSION["paymentAccountnumber"];

  // Payment Details for Credit Card
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
    <link rel="stylesheet" href="css/bookingsummary.css" />
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
        <span class="section-phrase">Reservation Summary</span>
        <div class="booking-summary-container">
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
              <p><?php echo $cottagetype ?></p>
            </div>

            <!-- Additional Notes -->
            <!-- <div class="section-details">
              <span>Additional Notes:</span>
              <p><?php echo $notesroom ?></p>
            </div>
          </div> -->

          <div class="details-container">
            <div class="section-title"><h3>Payment Details</h3></div>
            <!-- Payment Type -->
            <div class="section-details">
              <span>Payment Type:</span>
              <p>Downpayment</p>
            </div>

            <!-- Payment Method -->
            <div class="section-details">
              <span>Payment Method:</span>
              <p><?php echo $paymentType ?></p>
            </div>

            <!-- Account Name -->
            <div class="section-details">
              <span>Account Name:</span>
              <p><?php echo $paymentAccountname ?></p>
            </div>

            <!-- Payment Method -->
            <div class="section-details">
              <span>Account Number:</span>
              <p><?php echo $paymentAccountnumber ?></p>
            </div>

            <!-- Reference Number -->
            <div class="section-details">
              <span>Reference Number:</span>
              <p>099887766554321</p>
            </div>

            <!-- Proof of Payment -->
            <div class="section-details">
              <span>Proof of Payment:</span>
              <p>payment.img</p>
            </div>
          </div>

          <div class="details-container">
            <div class="section-title"><h3>Amount</h3></div>

            <!-- Total Cost -->
            <div class="section-details">
              <span>Total Cost:</span>
              <p><?php echo $TotalCost ?></p>
            </div>

            <!-- Downpayment -->
            <div class="section-details">
              <span>Downpayment:</span>
              <p><?php echo $downpayment ?></p>
            </div>

            <hr class="horizontal-line" />

            <!-- Total Cost -->
            <!-- <div class="section-details">
              <span class="totalCost">Total Cost:</span>
              <p class="totalCostNumber"><?php echo ''.$TotalCost ?></p>
            </div> -->

            <div class="cta-buttons">
              <a href="index.php" id="cancelButton">
                <button type="button" class="secondary-btn">CANCEL</button>
              </a>
              <a href="confirmation.html" id="confirmBooking">
                <button class="primary-btn">
                  CONFIRM BOOKING
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of booking summary -->
  </body>
</html>
