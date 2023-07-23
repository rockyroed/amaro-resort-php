<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/account.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- start of nav -->
    <section id="navBar" class="page-section active">
      <div class="nav" id="nav">
        <div class="site-nav">
          <div class="site-name" id="site-name">
            <a href="index.php" id="navlogo">
              <img
                src="css/page-images/AmaroResort.png"
                alt="logo"
                class="logo"
              />
            </a>
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
            <span id="firstNameDisplay">Trisha Mae</span>
            <span id="emailAddDisplay">erandiotrish@gmail.com</span>
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
        <section class="account-settings-container hidden" id="accountSettingsContainer">
          <div class="page-title">
            <span>Account Settings</span>
          </div>

          <hr class="horizontal-line" />

          <div class="form">
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
                  size="40"
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
                  size="40"
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
                  size="50"
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
          </div>
          <div class="settings-buttons">
            <a href="#" id="cancelButton">
              <button type="button" class="secondary-btn">CANCEL</button>
            </a>
            <a href="#" id="settings">
              <button type="button" class="primary-btn">SAVE</button>
            </a>
          </div>
        </section>
        <!-- start of account settings-->

        <!-- start of booking history -->
        <section class="booking-history-container" id="bookingHistoryContainer">
          <div class="page-title">
            <span>Booking History</span>
          </div>

          <hr class="horizontal-line" />

          <div class="booking-table">
            <table id="booking">
              <tr>
                <th>Reservation #</th>
                <th>Type</th>
                <th>Date</th>
                <th>Details</th>
                <th>Status</th>
              </tr>
              <tr>
                <td>RSVSWM230720XYZ</td>
                <td>Swimming</td>
                <td>07/20/2023</td>
                <td><a href="details.html" alt="view">view</a></td>
                <td>Paid - Down Payment</td>
              </tr>
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
