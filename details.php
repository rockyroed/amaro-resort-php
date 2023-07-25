<?php
session_start();
require_once "includes/dbh.inc.php";

  if(isset($_GET['reservation_id'])){
    $reservation_id = $_GET['reservation_id'];
    $query = "SELECT * FROM reservations WHERE reservation_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $reservation_id = $result["reservation_id"];
      $guest_id = $result["guest_id"];
      $res_type = $result["reservation_type"];
      $date_created = $result["reservation_date"];
      $paymentMethod = $result["payment_method"];
      $totalcost = $result["total_cost"];
      $downpayment = $result["downpayment"];   
  }

  // Guest Details
  $query = "SELECT * FROM guests WHERE guest_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$guest_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result) {
    $firstname = $result["first_name"];
    $middlename = $result["middle_name"];
    $lastname = $result["last_name"];
    $phonenumber = $result["phone_number"];
    $emailaddress = $result["email_address"];
  }
}


  // Reservation Details for Swimming
  if($res_type == "Swimming"){
    $query = "SELECT * FROM swimming_reservations WHERE reservation_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $dateofvisit = $result["date_of_visit"];
      $timeSlot = $result["time_slot"];
      $Adult = $result["adult"];
      $Children = $result["children"];
      $SeniorPWD = $result["senior_pwd"];
      $cottage_id = $result["cottage_id"];
    }

    // Cottage Details
    $query = "SELECT * FROM cottages WHERE cottage_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$cottage_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $cottagetypename = $result["cottage_type_name"];
    }
}
  // Reservation Details for Room
  if($res_type == "Room"){
    $query = "SELECT * FROM room_reservations WHERE reservation_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $checkin = $result["check_in"];
      $checkout = $result["check_out"];
      $room_id = $result["room_id"];
      $paxNum = $result["pax_number"];
    }

    // Room Details
    $query = "SELECT * FROM rooms WHERE room_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$room_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $roomtype = $result["room_type"];
    }
    
}
  // Reservation Details for Events
  if($res_type == "Events"){
    $query = "SELECT * FROM event_reservations WHERE reservation_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $eventVenueNumber = $result["event_venu_number"];
      $eventPax = $result["pax_number"];
      $venueArea = $result["event_type"];
  }
}
  
  
  // Payment Details for Paypal
  if($paymentMethod == "paypal"){
    $query = "SELECT * FROM paypal_payment_details WHERE reservation_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $paymentEmailadd = $result["email_address"];
  }
}
  // Payment Details for GCash
  if($paymentMethod == "gcash"){
    $query = "SELECT * FROM gcash_payment_details WHERE reservation_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $paymentAccountname = $result["account_name"];
      $paymentAccountnumber = $result["account_number"];
  }
}
  // Payment Details for Credit Card
  if($paymentMethod == "mastercard"){
    $query = "SELECT * FROM mastercard_payment_details WHERE reservation_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
      $paymentCardnumber = $result["card_number"];
      $paymentCardname = $result["card_name"];
      $mm = $result["mm"];
      $YYYY = $result["YYYY"];
      $CVV = $result["CVV"];
  }
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
              <p><?php echo $date_created ?></p>
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
            <?php if($res_type == "Swimming"): ?>
              <!-- Reservation Type-->
              <div class="section-details">
                <span>Reservation Type:</span>
                <p><?php echo $res_type ?></p>
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
            <?php elseif($res_type == "Room"): ?>
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
                <p><?php echo $res_type ?></p>
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
              <?php if($paymentMethod == "Paypal"): ?>
                <?php  echo $paymentMethod; ?>
                <!-- Payment Method -->
                <div class="section-details">
                  <span>Payment Method:</span>
                  <p><?php echo ucfirst($paymentMethod) ?></p>
                </div>

                <!-- Account Name -->
                <div class="section-details">
                  <span>Email Address:</span>
                  <p><?php echo $paymentEmailadd ?></p>
                </div>

              <?php elseif($paymentMethod == "Gcash"): ?>
                <!-- Payment Method -->
                <div class="section-details">
                  <span>Payment Method:</span>
                  <p><?php echo ucfirst($paymentMethod) ?></p>
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
                  <p><?php echo ucfirst($paymentMethod) ?></p>
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
