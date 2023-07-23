<?php
session_start();

$error = "";

  if(isset($_POST['restype']) && isset($_POST["FirstName"]) && isset($_POST["MiddleName"]) && isset($_POST["LastName"]) && isset($_POST["PhoneNumber"]) && isset($_POST["EmailAddress"])) {
    $type = $_POST["restype"];
    $firstname = $_POST["FirstName"];
    $middlename = $_POST["MiddleName"];
    $lastname = $_POST["LastName"];
    $phonenumber = $_POST["PhoneNumber"];
    $emailaddress = $_POST["EmailAddress"];

    $_SESSION["Type"] = $type;
    $_SESSION["FirstName"] = $firstname; 
    $_SESSION["MiddleName"] = $middlename;
    $_SESSION["LastName"] = $lastname; 
    $_SESSION["PhoneNumber"] = $phonenumber;
    $_SESSION["EmailAddress"] = $emailaddress;
    header("Location: bookingdetails.php"); die();
    
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/reservation.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <section id="reservation">
      <div class="left-book">
        <div class="left-container">
          <h1>CHOOSE A RESERVATION</h1>
          <a href="#swim-book" id="swimBook">
            <button type="button" class="book-btn selected" value="Swimming" id="swimming-btn">
              SWIMMING
            </button>
          </a>
          <a href="#room-book" id="roomBook">
            <button type="button" class="book-btn" value="Room" id="room-btn">ROOM</button>
          </a>
          <a href="#event-book" id="eventBook">
            <button type="button" class="book-btn" value="Event" id="event-btn">EVENT</button>
          </a>
        </div>
      </div>
      <div class="right-book">
        <div class="right-container">
          <img src="images/AmaroResort.png" alt="logo" class="logo" />
          <span class="section-name" id="section-name"
            >SWIMMING RESERVATION</span
          >
          <div class="form-container">
            <header>Guest Details</header>
            <p>Fill out the required fields to reserve.</p>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
              <!-- Full Name Column -->
              <input class="hidden" id="restype" name="restype">
              <div class="column">
                <!-- First Name -->
                <div class="input-box">
                  <label for="FirstName">First Name</label>
                  <input
                    type="text"
                    id="firstName"
                    title="First Name"
                    name="FirstName"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder="First Name"
                    required
                  />
                </div>

                <!-- Middle Name -->
                <div class="input-box">
                  <label for="MiddleName">Middle Name</label>
                  <input
                    type="text"
                    id="middleName"
                    title="Middle Name"
                    name="MiddleName"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="Middle Name"
                    required
                  />
                </div>

                <!-- Last Name -->
                <div class="input-box">
                  <label for="LastName">Last Name</label>
                  <input
                    type="text"
                    id="lastName"
                    title="Last Name"
                    name="LastName"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="Last Name"
                    required
                  />
                </div>
              </div>

              <!-- Phone Number -->
              <div class="column">
                <div class="input-box">
                  <label for="PhoneNumber">Phone Number</label>
                  <input
                    type="tel"
                    id="phoneNumber"
                    title="11-Digit Phone Number"
                    name="PhoneNumber"
                    placeholder="(09)00-000-0000"
                    maxlength="11"
                    pattern="[09]{2}[0-9]{9}"
                    required
                  />
                </div>

                <!-- Email Address -->
                <div class="input-box">
                  <label for="EmailAddress">Email Address</label>
                  <input
                    type="email"
                    id="emailAddress"
                    title="Email Address"
                    name="EmailAddress"
                    value=""
                    size="50"
                    maxlength="50"
                    placeholder="Email Address"
                    required
                  />
                </div>
              </div>

              <hr class="horizontal-line" />

              <div class="cta-buttons">
                <a href="index.php" id="cancelButton">
                  <button type="button" class="secondary-btn">CANCEL</button>
                </a>
                <!-- <a href="bookingdetails.php" id="reserveButton"> -->
                  <button class="primary-btn">BOOK NOW</button>
                </a>
              </div>
            </form>
            <!-- End of Form -->
          </div>
        </div>
      </div>
    </section>
    <script type="module" src="./javascript/reservation.js"></script>
  </body>
</html>
