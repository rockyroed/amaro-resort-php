<?php
session_start();

if(isset($_POST["dateofvisit"])) {

  $dateofvisit = $_POST['dateofvisit'];
  $timeSlot = $_POST['timeSlot'];
  $Adult = $_POST['Adult'];
  $Children = $_POST['Children'];
  $SeniorPWD = $_POST['SeniorPWD'];
  $cottagetype = $_POST['cottagetype'];
  $notesroom = $_POST['notesroom'];
  $payment = $_POST['cottagetype'];
  $TotalCost = $_POST['TotalCost'];

  $_SESSION["FirstName"] = $firstname; 
  $_SESSION["MiddleName"] = $middlename;
  $_SESSION["LastName"] = $lastname; 
  $_SESSION["PhoneNumber"] = $phonenumber;
  $_SESSION["EmailAddress"] = $emailaddress;

  $_SESSION['dateofvisit'] = $dateofvisit;
  $_SESSION['timeSlot'] = $timeSlot;
  $_SESSION['Adult'] = $Adult;
  $_SESSION['Children'] = $Children;
  $_SESSION['SeniorPWD'] = $SeniorPWD;
  $_SESSION['cottagetype'] = $cottagetype;
  $_SESSION['notesroom'] = $notesroom;
  $_SESSION['payment'] = $payment;
  $_SESSION['TotalCost'] = $TotalCost;
  header("Location: paymentdetails.php"); die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bookingdetails.css" />
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
            <button type="button" class="book-btn">SWIMMING</button>
          </a>
          <a href="#swim-book" id="roomBook">
            <button type="button" class="book-btn">ROOM</button>
          </a>
          <a href="#swim-book" id="eventBook">
            <button type="button" class="book-btn">EVENT</button>
          </a>
        </div>
      </div>
      <div class="right-book">
        <div class="right-container">
          <img src="images/AmaroResort.png" alt="logo" class="logo" />
          <span class="section-name">SWIMMING RESERVATION</span>
          <div class="form-container">
            <header>Reservation Details</header>
            <p>Fill out the required fields to reserve.</p>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="#" class="form" method="post">
              <div class="column">
                <!-- Date of Visit -->
                <div class="input-box">
                  <label for="DateOfVisit">Date of Visit</label>
                  <input
                    type="date"
                    id="dateofvisit"
                    name="dateofvisit"
                    title="Date of Visit"
                    placeholder="DD-MMM-YYYY"
                    required
                  />
                </div>

                <!-- Time Slot -->
                <div class="input-box">
                  <label for="TimeSlot">Time Slot</label>
                  <div class="select-box">
                    <select
                      title="timeslot"
                      id="timeSlot"
                      name="timeslot"
                      required
                    >
                      <option hidden value="">Day or Night</option>
                      <option value="Day">DAY (8:00 AM - 5:00 PM)</option>
                      <option value="Night">NIGHT (7:00 PM - 4:00 AM)</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="column">
                <div class="input-box">
                  <!-- Adult -->
                  <label for="Adult">Adult</label>
                  <input
                    type="number"
                    id="adult"
                    title="Adult"
                    name="Adult"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- Children -->
                <div class="input-box">
                  <label for="Children">Children</label>
                  <input
                    type="number"
                    id="children"
                    title="Children"
                    name="Children"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- Senior/PWD -->
                <div class="input-box">
                  <label for="SeniorPWD">Senior/PWD</label>
                  <input
                    type="number"
                    id="seniorPWD"
                    title="SeniorPWD"
                    name="SeniorPWD"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>
              </div>

              <!-- Cottage Type -->
              <div class="input-box">
                <label for="CottageType">Cottage Type</label>
                <div class="select-box">
                  <select
                    title="cottage type"
                    id="cottagetype"
                    name="cottagetype"
                    required
                  >
                    <option hidden value="">Select Cottage</option>
                    <option value="Pavillion">Pavillion</option>
                    <option value="Night">NIGHT (7:00 PM - 4:00 AM)</option>
                  </select>
                </div>
              </div>

              <!-- Additional Notes -->
              <div class="input-box">
                <label for="Notes">Additional Notes</label>
                <textarea
                  id="notesRoom"
                  title="AdditionalNotes"
                  name="notesroom"
                  placeholder="Type any additional notes here"
                ></textarea>
              </div>

              <hr class="horizontal-line" />

              <!-- Payment -->
              <div class="input-box">
                <label for="payment">Payment</label>
                <div class="select-box">
                  <select
                    title="payment"
                    id="payment"
                    name="payment"
                    required
                  >
                    <option hidden value="">
                      Down Payment or Full Payment
                    </option>
                    <option value="DownPayment">Down Payment (20%)</option>
                    <option value="FullPayment">Full Payment</option>
                  </select>
                </div>
              </div>

              <!-- Total Cost -->
              <div class="input-box">
                <label for="TotalCost" id="tcostLabel">Total Cost</label>
                <input
                  type="number"
                  id="totalCost"
                  title="totalCost"
                  name="TotalCost"
                  value=""
                  size="30"
                  maxlength="50"
                  placeholder="0"
                  required
                />
              </div>

              <div class="cta-buttons">
                <a href="reservation.html" id="backButton">
                  <button type="button" class="secondary-btn">BACK</button>
                </a>
                <!-- <a href="" id="proceedPayment"> -->
                  <button class="primary-btn">
                    PROCEED TO PAYMENT
                  </button>
                </a>
              </div>
            </form>
            <!-- End of Form -->
          </div>

          <!-- Room Reservation -->
          <div class="form-container">
            <header>Reservation Details</header>
            <p>Fill out the required fields to reserve.</p>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="#" class="form" method="get">
              <div class="column">
                <!-- Check-In -->
                <div class="input-box">
                  <label for="Check-In">Check-In</label>
                  <input
                    type="date"
                    id="checkin"
                    title="Check-in"
                    placeholder="DD-MMM-YYYY"
                    required
                  />
                </div>

                <!-- Check-Out -->
                <div class="input-box">
                  <label for="Check-Out">Check-Out</label>
                  <input
                    type="date"
                    id="checkout"
                    title="Check-out"
                    placeholder="DD-MMM-YYYY"
                    required
                  />
                </div>
              </div>
              <div class="column">
                <div class="input-box">
                  <!-- Adult -->
                  <label for="Adult">Adult</label>
                  <input
                    type="number"
                    id="adult"
                    title="Adult"
                    name="Adult"
                    value=""
                    size="40"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- Children -->
                <div class="input-box">
                  <label for="Children">Children</label>
                  <input
                    type="number"
                    id="children"
                    title="Children"
                    name="Children"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- Senior/PWD -->
                <div class="input-box">
                  <label for="SeniorPWD">Senior/PWD</label>
                  <input
                    type="number"
                    id="seniorPWD"
                    title="SeniorPWD"
                    name="SeniorPWD"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>
              </div>

              <!-- Cottage Type -->
              <div class="input-box">
                <label for="RoomType">Room Type</label>
                <div class="select-box">
                  <select
                    title="room type"
                    id="roomtype"
                    name="room type"
                    required
                  >
                    <option hidden value="">Select Room</option>
                    <option value="CoupleRoom">Couple Room (₱2,000)</option>
                    <option value="FamilyRoom">Family Room (₱2,800)</option>
                  </select>
                </div>
              </div>

              <!-- Additional Notes -->
              <div class="input-box">
                <label for="notes">Additional Notes</label>
                <textarea
                  id="notesSwim"
                  title="Additional Notes"
                  name="notes swim"
                  placeholder="Type any additional notes here"
                ></textarea>
              </div>

              <hr class="horizontal-line" />

              <!-- Payment -->
              <div class="input-box">
                <label for="CottageType">Payment</label>
                <div class="select-box">
                  <select
                    title="cottage type"
                    id="cottagetype"
                    name="cottage type"
                    required
                  >
                    <option hidden value="">
                      Down Payment or Full Payment
                    </option>
                    <option value="DownPayment">Down Payment (20%)</option>
                    <option value="FullPayment">Full Payment</option>
                  </select>
                </div>
              </div>

              <!-- Total Cost -->
              <div class="input-box">
                <label for="TotalCost" id="tcostLabel">Total Cost</label>
                <input
                  type="number"
                  id="totalCost"
                  title="totalCost"
                  name="TotalCost"
                  value=""
                  size="30"
                  maxlength="50"
                  placeholder="0"
                  required
                />
              </div>

              <div class="cta-buttons">
                <a href="index.php" id="cancelButton">
                  <button type="button" class="secondary-btn">CANCEL</button>
                </a>
                <a href="paymentdetails.html" id="proceedPayment">
                  <button type="button" class="primary-btn">
                    PROCEED TO PAYMENT
                  </button>
                </a>
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of Room Reservation -->

          <!-- Event Reservation -->
          <div class="form-container">
            <header>Reservation Details</header>
            <p>Fill out the required fields to reserve.</p>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="#" class="form" method="get">
              <div class="column">
                <!-- Event Date -->
                <div class="input-box">
                  <label for="Event-Date">Event Date</label>
                  <input
                    type="date"
                    id="eventDate"
                    title="Event Date"
                    placeholder="DD-MMM-YYYY"
                    required
                  />
                </div>

                <!-- Event Type -->
                <div class="input-box">
                  <label for="EventType">Event Type</label>
                  <div class="select-box">
                    <select
                      title="event type"
                      id="eventtype"
                      name="event type"
                      required
                    >
                      <option hidden value="">Select Event</option>
                      <option value="Birthday">Birthday</option>
                      <option value="Debut">Debut</option>
                      <option value="Anniversary">Debut</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="column">
                <!-- Pax Number -->
                <div class="input-box">
                  <label for="PaxNumber">Pax Number</label>
                  <input
                    type="number"
                    id="paxNum"
                    title="Pax Number"
                    name="Pax Number"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                  />
                </div>

                <!-- Venue / Area -->
                <div class="input-box">
                  <label for="VenueArea">Venue / Area</label>
                  <div class="select-box">
                    <select
                      title="venue area"
                      id="venueArea"
                      name="venue area"
                      required
                    >
                      <option hidden value="">Select Venue</option>
                      <option value="CoupleRoom">Function Hall</option>
                      <option value="FamilyRoom">Court / Event Area</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Additional Notes -->
              <div class="input-box">
                <label for="notes">Additional Notes</label>
                <textarea
                  id="notesSwim"
                  title="Additional Notes"
                  name="notes swim"
                  placeholder="Type any additional notes here"
                ></textarea>
              </div>

              <hr class="horizontal-line" />

              <!-- Payment -->
              <div class="input-box">
                <label for="CottageType">Payment</label>
                <div class="select-box">
                  <select
                    title="cottage type"
                    id="cottagetype"
                    name="cottage type"
                    required
                  >
                    <option hidden value="">
                      Down Payment or Full Payment
                    </option>
                    <option value="DownPayment">Down Payment (20%)</option>
                    <option value="FullPayment">Full Payment</option>
                  </select>
                </div>
              </div>

              <!-- Total Cost -->
              <div class="input-box">
                <label for="TotalCost" id="tcostLabel">Total Cost</label>
                <input
                  type="number"
                  id="totalCost"
                  title="totalCost"
                  name="TotalCost"
                  value=""
                  size="30"
                  maxlength="50"
                  placeholder="0"
                  required
                />
              </div>

              <div class="cta-buttons">
                <a href="index.php" id="cancelButton">
                  <button type="button" class="secondary-btn">CANCEL</button>
                </a>
                <a href="paymentdetails.html" id="proceedPayment">
                  <button type="button" class="primary-btn">
                    PROCEED TO PAYMENT
                  </button>
                </a>
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of Event Reservation -->
        </div>
      </div>
    </section>
  </body>
</html>
