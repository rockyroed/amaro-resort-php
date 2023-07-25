<?php
session_start();
require_once "includes/dbh.inc.php";

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
    $cottagetypename = $_SESSION["cottageTypeName"];
    $swimRoom = $_SESSION['swimRoom'];

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
    $roomNum = $_SESSION['roomNum'];
    
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
    $eventNum = $_SESSION["event_venue_id"];
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

$reserveQuery = "select reservation_id from reservations";
$result = mysqli_query($con, $reserveQuery);

$referencenumber = bin2hex(random_bytes(16));
$timeStamp = date("Y-m-d H:i:s");

check:
  while ($row = mysqli_fetch_assoc($result)) {
    $reservation_id = $row['reservation_id'];
    if($referencenumber == $reservation_id){
      $referencenumber = bin2hex(random_bytes(16));
      goto check;
    }
  }
  
  if (isset($_POST['submit'])){
    $guest_id = ($_SESSION['guest_id']);
    $_SESSION['reservation_id'] = $referencenumber;
    $_SESSION['reservation_date'] = $timeStamp;

    $resQuery = "INSERT INTO reservations (reservation_id,guest_id, reservation_type,reservation_date,payment_method,total_cost,down_payment,payment_status) 
    VALUES ('$referencenumber', '$guest_id', '$type', '$timeStamp', '$paymentType','$totalcostNum','$downpaymentNum', 'Pending')";
    
    $verify = mysqli_query($con, $resQuery);
  
    if ($verify) {
        if ($type == "Swimming") {
          $cottageQuery = "SELECT cottage_id FROM cottages WHERE cottage_type = '$cottagetypename'";
          $cottageResult = mysqli_query($con, $cottageQuery);
          $cottageRow = mysqli_fetch_assoc($cottageResult);
          $cottage_id = $cottageRow['cottage_id'];
          $cottage_idnum = (int)$cottage_id;


          $swimQuery = "INSERT INTO swimming_reservations (reservation_id, chosen_hour, pax_adults, pax_children, pax_senior, cottage_number) 
          VALUES ('$referencenumber', '$timeSlot', '$Adult', '$Children', '$SeniorPWD', '$swimRoom')";
          $swimVerify = mysqli_query($con, $swimQuery);
          $swimRoomQuery = "UPDATE cottage_numbers SET reserved_check_in = '$dateofvisit' WHERE cottage_number = '$swimRoom'";
          $swimRoomVerify = mysqli_query($con, $swimRoomQuery);
      }elseif($type == "Room"){
          $roomQuery = "SELECT room_id FROM rooms WHERE room_type = '$roomtype'";
          $roomResult = mysqli_query($con, $roomQuery);
          $roomRow = mysqli_fetch_assoc($roomResult);
          $room_id = $roomRow['room_id'];



          $roomResQuery = "INSERT INTO room_reservations (reservation_id, room_type, pax_number, room_number) 
          VALUES ('$referencenumber', '$room_id', '$paxNum', '$roomNum')";
          $roomResVerify = mysqli_query($con, $roomResQuery);
          $roomNumQuery = "UPDATE room_numbers SET reserved_check_in = '$checkin', reserved_check_out = '$checkout' WHERE room_number = '$roomNum'";
          $roomNumVerify = mysqli_query($con, $roomNumQuery);
      }else{
          $eventTypeQuery = "SELECT event_venue_id FROM event_venues WHERE event_type = '$venueArea'";
          $eventTypeResult = mysqli_query($con, $eventTypeQuery);
          $eventTypeRow = mysqli_fetch_assoc($eventTypeResult);
          $event_venue_id = $eventTypeRow['event_venue_id'];
          $eventQuery = "INSERT INTO event_reservations (reservation_id, event_type, pax_number, event_venue_number) 
          VALUES ('$referencenumber', '$venueArea', '$eventPax', '$eventNum')";
          $eventVerify = mysqli_query($con, $eventQuery);
          $eventNumQuery = "UPDATE event_venue_numbers SET reserved_check_in = '$eventDate' WHERE event_venue_number = '$eventNum'";
          $eventNumVerify = mysqli_query($con, $eventNumQuery);
      }

      if ($paymentType == "paypal") {
        $paypalQuery = "INSERT INTO paypal_payment_details (reservation_id, email_address) 
        VALUES ('$referencenumber', '$paymentEmailadd')";
        $paypalVerify = mysqli_query($con, $paypalQuery);
      }elseif($paymentType == "gcash"){
        $gcashQuery = "INSERT INTO gcash_payment_details (reservation_id, account_name, account_number) 
        VALUES ('$referencenumber', '$paymentAccountname', '$paymentAccountnumber')";
        $gcashVerify = mysqli_query($con, $gcashQuery);
      }else{
        $mm = (int)$mm;
        $YYYY = (int)$YYYY;
        $CVV = (int)$CVV;
        $creditQuery = "INSERT INTO mastercard_payment_details  (reservation_id, cardholder_number, cardholder_name, mm, yyyy, cvv) 
        VALUES ('$referencenumber', '$paymentCardnumber', '$paymentCardname', $mm, $YYYY, $CVV)";
        $creditVerify = mysqli_query($con, $creditQuery);
      }


      header ("Location: confirmation.php");
  }
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

            <hr class="horizontal-line" />
            
            <div class="cta-buttons">
              <a href="index.php" id="cancelButton">
                <button type="button" class="secondary-btn">CANCEL</button>
              </a>
              <form method="post">
              <button class="primary-btn" name="submit">
                CONFIRM BOOKING
              </button>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- end of booking summary -->
  </body>
</html>
