<?php
session_start();
require_once "includes/dbh.inc.php";

if (isset($_SESSION["email_address"]) && !empty($_SESSION["email_address"])) {
  $isLoggedIn = true;
} else {
  $isLoggedIn = false;
}

if (isset($_SESSION["guest_id"])) {
  $guestid = $_SESSION["guest_id"];
  $query = "SELECT * FROM guests WHERE guest_id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$guestid]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $firstname = $result["first_name"];
  $middlename = $result["middle_name"];
  $lastname = $result["last_name"];
  $phonenumber = $result["phone_number"];
  $emailaddress = $result["email_address"];
}



if ((isset($_POST["FirstName"]) && (isset($_POST["MiddleName"])) && (isset($_POST["LastName"]))
  && (isset($_POST['PhoneNumber'])) && (isset($_POST['EmailAddress'])))) {
  $firstname = $_POST["FirstName"];
  $middlename = $_POST["MiddleName"];
  $lastname = $_POST["LastName"];
  $phonenumber = $_POST["PhoneNumber"];
  $emailaddress = $_POST["EmailAddress"];

  try {
    require_once "includes/dbh.inc.php";

    $query = "UPDATE guests SET first_name = ?, middle_name = ?, last_name = ?, phone_number = ?, email_address = ? WHERE guest_id = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$firstname, $middlename, $lastname, $phonenumber, $emailaddress, $guestid]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
      $guest_id = $result["guest_id"];
      $firstname = $result["first_name"];
      $middlename = $result["middle_name"];
      $lastname = $result["last_name"];
      $phonenumber = $result["phone_number"];
      $emailaddress = $result["email_address"];
      $type = $result["type"];
      $creationdate = $result["creation_date"];
      $_SESSION['guest_id'] = $guest_id;
      header("Location: index.php");
      die;
    } else {
      $error = "Cannot log in. The user is not existing or the password is incorrect. Please try again.";
    }

    $pdo = null;
    $stmt = null;
  } catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/account.css" />
  <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
  <title>Account | Amaro Resort</title>
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- start of nav -->
  <section id="navBar" class="page-section active">
    <div class="nav" id="nav">
      <div class="site-nav">
        <div class="site-name" id="site-name">
          <a href="index.php" id="navlogo">
            <img src="images/AmaroResort.png" alt="logo" class="logo" />
          </a>
        </div>
        <div class="nav-bar" id="navbar">
          <a class="navBar" href="index.php"> Home </a>
          <a class="navBar" href="about.php"> About </a>
          <a class="navBar" href="services.php"> Services </a>
          <a class="navBar" href="reservation.php"> Reservation </a>
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
          <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
      </div>
    </div>
  </section>
  <!-- end of nav -->

  <!-- start of account -->
  <section id="account-container">
    <div class="left-side">
      <div class="left-container">
        <span><i class="fas fa-user-edit"></i>Account</span>
        <div class="account-pic">
          <i class="fas fa-user-circle"></i>
        </div>
        <div class="account-info">
          <span id="firstNameDisplay"><?php echo $firstname . ' ' . $lastname ?></span>
          <span id="emailAddDisplay"><?php echo $emailaddress ?></span>
        </div>

        <div class="page-buttons">
          <a href="" id="bookingHistory">
            <button type="button" class="page-btn selected">BOOKING</button>
          </a>
          <a href="#accountSettings" id="settings">
            <button type="button" class="page-btn">SETTINGS</button>
          </a>
        </div>
      </div>
    </div>
    <div class="right-side">
      <!-- start of account settings -->
      <?php $stng_query = "select * from guests where guest_id = '$guestid'" ?>
      <?php $stng_result = mysqli_query($con, $stng_query) ?>
      <?php $stng_row = mysqli_fetch_assoc($stng_result) ?>
      <section class="account-settings-container hidden" id="accountSettingsContainer">
        <form method="post">
          <div class="page-title">
            <span>Account Settings</span>
          </div>

          <hr class="horizontal-line" />

          <div class="form">
            <div class="column">
              <!-- First Name -->
              <div class="input-box">
                <label for="FirstName">First Name</label>
                <input type="text" id="firstName" title="First Name" name="FirstName" value="<?php echo $stng_row['first_name'] ?>" size="40" maxlength="50" placeholder="<?php echo $stng_row['first_name'] ?>" required />
              </div>

              <!-- Middle Name -->
              <div class="input-box">
                <label for="MiddleName">Middle Name</label>
                <input type="text" id="middleName" title="Middle Name" name="MiddleName" value="<?php echo $stng_row['middle_name'] ?>" size="40" maxlength="50" placeholder="<?php echo $stng_row['middle_name'] ?>" required />
              </div>

              <!-- Last Name -->
              <div class="input-box">
                <label for="LastName">Last Name</label>
                <input type="text" id="lastName" title="Last Name" name="LastName" value="<?php echo $stng_row['last_name'] ?>" size="40" maxlength="50" placeholder="<?php echo $stng_row['last_name'] ?>" required />
              </div>
            </div>

            <!-- Phone Number -->
            <div class="column">
              <div class="input-box">
                <label for="PhoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" title="11-Digit Phone Number" name="PhoneNumber" value="<?php echo $stng_row['phone_number'] ?>" placeholder="<?php echo $stng_row['phone_number'] ?>" maxlength="11" size="50" pattern="[09]{2}[0-9]{9}" required />
              </div>

              <!-- Email Address -->
              <div class="input-box">
                <label for="EmailAddress">Email Address</label>
                <input type="email" id="emailAddress" title="Email Address" name="EmailAddress" value="<?php echo $stng_row['email_address'] ?>" size="50" maxlength="50" placeholder="<?php echo $stng_row['email_address'] ?>" required />
              </div>
            </div>
          </div>
          <div class="settings-buttons">
            <a href="#" id="cancelButton">
              <button type="button" class="secondary-btn">CANCEL</button>
            </a>
            <!-- <a href="#" id="settings"> -->
            <button class="primary-btn">SAVE</button>
            </a>
          </div>
        </form>
      </section>
      <!-- start of account settings-->

      <!-- start of booking history -->
      <section class="booking-history-container" id="bookingHistoryContainer">
        <?php $booking_query = "select * from reservations where guest_id = '$guestid' order by reservation_date desc" ?>
        <?php $booking_result = mysqli_query($con, $booking_query) ?>
        <div class="page-title">
          <span>Booking History</span>
        </div>

        <hr class="horizontal-line" />

        <div class="booking-table">
          <table id="booking">
            <tr>
              <th>Reservation #</th>
              <th>Type</th>
              <th>Reservation Date</th>
              <th>Details</th>
              <th>Status</th>
            </tr>
            <?php while ($booking_row = mysqli_fetch_assoc($booking_result)) { ?>
              <tr>
                <td><?php echo $booking_row['reservation_id'] ?></td>
                <td><?php echo $booking_row['reservation_type'] ?></td>
                <td><?php echo $booking_row['reservation_date'] ?></td>
                <td><a href="details.php?reservation_id=<?php echo $booking_row['reservation_id'] ?>" alt="view">View</a></td>
                <td><?php echo $booking_row['res_status'] ?></td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </section>
      <!-- end of booking history -->
    </div>
  </section>
  <!-- end of account -->
  <script type="module" src="./javascript/account.js"></script>
</body>

</html>