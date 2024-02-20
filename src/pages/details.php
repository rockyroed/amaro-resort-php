<?php
session_start();
require_once "../includes/dbh.inc.php";

if (isset($_SESSION["email_address"]) && !empty($_SESSION["email_address"])) {
  $isLoggedIn = true;
} else {
  $isLoggedIn = false;
}

if (isset($_GET['reservation_id'])) {
  $reservation_id = $_GET['reservation_id'];
  $query = "SELECT * FROM reservations WHERE reservation_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$reservation_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $reservation_id = $result["reservation_id"];
    $guest_id = $result["guest_id"];
    $res_type = $result["reservation_type"];
    $date_created = $result["reservation_date"];
    $paymentMethod = $result["payment_method"];
    $totalcost = $result["total_cost"];
    $downpayment = $result["down_payment"];
    $res_status = $result["res_status"];
  }

  // Guest Details
  $query = "SELECT * FROM guests WHERE guest_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$guest_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $firstname = $result["first_name"];
    $middlename = $result["middle_name"];
    $lastname = $result["last_name"];
    $phonenumber = $result["phone_number"];
    $emailaddress = $result["email_address"];
  }
}


// Reservation Details for Swimming
if ($res_type == "Swimming") {
  $query = "SELECT * FROM reservations
    LEFT JOIN swimming_reservations ON reservations.reservation_id = swimming_reservations.reservation_id
    LEFT JOIN cottage_numbers ON swimming_reservations.cottage_number = cottage_numbers.cottage_number
    LEFT JOIN cottages ON cottage_numbers.cottage_id = cottages.cottage_id
    WHERE reservations.reservation_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$reservation_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $dateofvisit = $result["reserved_check_in"];
    $timeSlot = $result["chosen_hour"];
    $Adult = $result["pax_adults"];
    $Children = $result["pax_children"];
    $SeniorPWD = $result["pax_senior"];
    $cottage_id = $result["cottage_number"];
    $cottageType = $result["cottage_type"];
  }

  // Cottage Details
  $query = "SELECT * FROM cottages WHERE cottage_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$cottage_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $cottagetypename = $result["cottage_type_name"];
  }
}
// Reservation Details for Room
if ($res_type == "Room") {
  $query = "SELECT * FROM reservations
    LEFT JOIN room_reservations ON reservations.reservation_id = room_reservations.reservation_id
    LEFT JOIN room_numbers ON room_reservations.room_number = room_numbers.room_number
    LEFT JOIN rooms ON room_numbers.room_id = rooms.room_id
    WHERE reservations.reservation_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$reservation_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $checkin = $result["reserved_check_in"];
    $checkout = $result["reserved_check_out"];
    $room_id = $result["room_id"];
    $paxNum = $result["pax_number"];
    $room_number = $result["room_number"];
  }

  // Room Details
  $query = "SELECT * FROM rooms WHERE room_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$room_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $roomtype = $result["room_type"];
  }
}
// Reservation Details for Events
if ($res_type == "Event") {
  $query = "SELECT * FROM reservations
    LEFT JOIN event_reservations ON reservations.reservation_id = event_reservations.reservation_id
    LEFT JOIN event_venue_numbers ON event_reservations.event_venue_number = event_venue_numbers.event_venue_number
    WHERE reservations.reservation_id = ?
    ";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$reservation_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $eventVenueNumber = $result["event_venue_number"];
    $eventPax = $result["pax_number"];
    $venueArea = $result["event_type"];
    $eventDate = $result["reserved_check_in"];
  }
}


// Payment Details for Paypal
if ($paymentMethod == "Paypal") {
  $query = "SELECT * FROM paypal_payment_details WHERE reservation_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$reservation_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $paymentEmailadd = $result["email_address"];
  }
}
// Payment Details for GCash
if ($paymentMethod == "GCash") {
  $query = "SELECT * FROM gcash_payment_details WHERE reservation_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$reservation_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $paymentAccountname = $result["account_name"];
    $paymentAccountnumber = $result["account_number"];
  }
}
// Payment Details for Credit Card
if ($paymentMethod == "MasterCard") {
  $query = "SELECT * FROM mastercard_payment_details WHERE reservation_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$reservation_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $paymentCardnumber = $result["cardholder_number"];
    $paymentCardname = $result["cardholder_name"];
    $mm = $result["mm"];
    $YYYY = $result["yyyy"];
    $CVV = $result["cvv"];
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/details.css" />
  <link rel="icon" href="../css/page-images/TabLogo.png" type="image/png" />
  <title>Reservation Details | Amaro Resort</title>
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>
  <section id="navBar" class="page-section active">
    <!-- start of nav -->
    <div class="nav" id="nav">
      <div class="site-nav">
        <div class="site-name" id="site-name">
          <a href="../../index.php" id="navlogo">
            <img src="../assets/AmaroResort.png" alt="logo" class="logo" />
          </a>
        </div>
        <div class="nav-bar" id="navbar">
          <a class="navBar" href="../../index.php"> Home </a>
          <a class="navBar" href="about.php"> About </a>
          <a class="navBar" href="services.php"> Services </a>
          <?php if ($isLoggedIn) : ?>
            <a class="navBar" href="reservation.php"> Reservation </a>
          <?php else : ?>
            <a class="navBar" href="login.php"> Reservation </a>
          <?php endif; ?>
          <a class="navBar" href="contact.php"> Contact </a>
        </div>

        <?php if ($isLoggedIn) : ?>
          <a href="reservation.php" id="book-button">
            <button type="button" class="book-btn">Book Now</button>
          </a>
        <?php else : ?>
          <a href="login.php" id="book-button">
            <button type="button" class="book-btn">Book Now</button>
          </a>
        <?php endif; ?>

        <div class="vl"></div>

        <div class="mobile-button">
          <span id="user-button">
            <?php if ($isLoggedIn) : ?>
              <i class="fas fa-user" id="user" title="Profile"></i>
            <?php else : ?>
              <a href="login.php">
                <i class="fas fa-sign-in-alt" id="user" title="Log In"></i>
              </a>
            <?php endif; ?>
          </span>

          <span id="menu-bar">
            <i class="fas fa-bars" id="main-menu"></i>
          </span>
        </div>


        <div class="account-menu" id="account-menu">
          <a href="account.php"><i class="fas fa-user-edit"></i>Account</a>
          <a href="logout.php?type=guest"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
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
          <div class="section-title">
            <h3>Reservation</h3>
          </div>
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

          <!-- Reservation Status -->
          <div class="section-details">
            <span>Reservation Status:</span>
            <p><?php echo $res_status ?></p>
          </div>
        </div>

        <div class="details-container">
          <div class="section-title">
            <h3>Guest Details</h3>
          </div>
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
          <div class="section-title">
            <h3>Reservation Details</h3>
          </div>
          <?php if ($res_type == "Swimming") : ?>
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
              <p><?php echo $cottageType ?></p>
            </div>

            <!-- Cottage ID -->
            <div class="section-details">
              <span>Cottage Number:</span>
              <p><?php echo $cottage_id ?></p>
            </div>
          <?php elseif ($res_type == "Room") : ?>
            <!-- Reservation Type-->
            <div class="section-details">
              <span>Reservation Type:</span>
              <p><?php echo $res_type ?></p>
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

            <!-- Room Number-->
            <div class="section-details">
              <span>Room Number:</span>
              <p><?php echo $room_number ?></p>
            </div>

            <!-- Pax Number-->
            <div class="section-details">
              <span>Pax Number:</span>
              <p><?php echo $paxNum ?></p>
            </div>
          <?php else : ?>
            <!-- Reservation Type-->
            <div class="section-details">
              <span>Reservation Type:</span>
              <p><?php echo $res_type ?></p>
            </div>

            <!-- Venue Type:-->
            <div class="section-details">
              <span>Venue Type:</span>
              <p><?php echo $eventVenueNumber ?></p>
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
            <div class="section-title">
              <h3>Payment Details</h3>
            </div>
            <?php if ($paymentMethod == "Paypal") : ?>
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

            <?php elseif ($paymentMethod == "GCash") : ?>
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
            <?php else : ?>
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
          <div class="section-title">
            <h3>Amount</h3>
          </div>

          <!-- Total Cost -->
          <div class="section-details">
            <span>Total Cost:</span>
            <p><?php echo '₱' . $totalcost ?></p>
          </div>

          <!-- Downpayment -->
          <div class="section-details">
            <span>Down Payment:</span>
            <p><?php echo '₱' . $downpayment ?></p>
          </div>
        </div>
      </div>
  </section>
  <!-- end of booking summary -->
  <script type="module" src="../javascript/details.js"></script>
</body>

</html>