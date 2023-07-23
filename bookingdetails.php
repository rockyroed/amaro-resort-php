<?php
session_start();
$type = $_SESSION["Type"];

$type = strtoupper($type);

if($type == "SWIMMING") {
  if(isset($_POST['dateofvisit']) && isset($_POST['timeslot']) && isset($_POST['Adult']) 
  && isset($_POST['Children']) && isset($_POST['SeniorPWD']) && isset($_POST['cottagetype']) 
  && isset($_POST['totalCost']) && isset($_POST['downPayment'])){
    $dateofvisit = $_POST['dateofvisit'];
    $timeslot = $_POST['timeslot'];
    $adult = $_POST['Adult'];
    $children = $_POST['Children'];
    $seniorPWD = $_POST['SeniorPWD'];
    $cottagetype = $_POST['cottagetype'];
    $TotalCost = $_POST['totalCost'];
    $downPayment = $_POST['downPayment'];

    $_SESSION["DateOfVisit"] = $dateofvisit;
    $_SESSION["TimeSlot"] = $timeslot;
    $_SESSION["Adult"] = $adult;
    $_SESSION["Children"] = $children;
    $_SESSION["SeniorPWD"] = $seniorPWD;
    $_SESSION["CottageType"] = $cottagetype;
    $_SESSION["totalCost"] = $TotalCost;
    $_SESSION["downPayment"] = $downPayment;
    echo "<script>alert('Success');</script>";
    header("Location: paymentdetails.php"); die();
  }
  /* 
checkin
checkout
Adult
Children
SeniorPWD
roomtype
TotalCost 
*/
} elseif($type == "ROOM") {
  if(isset($_POST['roomtype']) && isset($_POST['checkin']) && isset($_POST['checkout'])
  && isset($_POST['Adult']) && isset($_POST['Children']) && isset($_POST['SeniorPWD'])
  && isset($_POST['totalCost']) && isset($_POST['downPayment'])){
    $roomtype = $_POST['roomtype'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adult = $_POST['Adult'];
    $children = $_POST['Children'];
    $seniorPWD = $_POST['SeniorPWD'];
    $TotalCost = $_POST['totalCost'];
    $downPayment = $_POST['downPayment'];

    $_SESSION["RoomType"] = $roomtype;
    $_SESSION["CheckIn"] = $checkin;
    $_SESSION["CheckOut"] = $checkout;
    $_SESSION["Adult"] = $adult;
    $_SESSION["Children"] = $children;
    $_SESSION["SeniorPWD"] = $seniorPWD;
    $_SESSION["totalCost"] = $TotalCost;
    $_SESSION["downPayment"] = $downPayment;
    echo "<script>alert('Success');</script>";
    header("Location: paymentdetails.php"); die();
  }
    
} else if ($type == "EVENT") {
  if(isset($_POST['eventDate']) && isset($_POST['PaxNumber']) && isset($_POST['venuearea'])){
  $eventDate = $_POST['eventDate'];
  $eventPax = $_POST['PaxNumber'];
  $venueArea = $_POST['venuearea'];
  $TotalCost = $_POST['totalCost'];
  $downPayment = $_POST['downPayment'];

  $_SESSION["EventDate"] = $eventDate;
  $_SESSION["EventPax"] = $eventPax;
  $_SESSION["VenueArea"] = $venueArea;
  $_SESSION["totalCost"] = $TotalCost;
  $_SESSION["downPayment"] = $downPayment;
  echo "<script>alert('Success');</script>";
  header("Location: paymentdetails.php"); die();
  }

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <section id="reservation">
      <div class="right-book">
        <div class="right-container">
          <img src="images/AmaroResort.png" alt="logo" class="logo" />
          <span class="section-name"><?php echo $type.' '.'RESERVATION'?></span>
          <?php if($type == "SWIMMING"): ?>
          <div class="form-container">
            <header>Reservation Details</header>
            <p>Fill out the required fields to reserve.</p>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
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
                <div class="hidden" id="timeRet">

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
                    value="0"
                    size="40"
                    maxlength="50"
                    placeholder="0"
                    required
                    onclick="calculateSwimTotal()"
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
                    value="0"
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                    onclick="calculateSwimTotal()"
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
                    value="0"
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                    onclick="calculateSwimTotal()"
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
                    onclick="calculateSwimTotal()"
                  >
                    <option hidden value="0">Select Cottage</option>
                    <option value="0">None</option>
                    <option value="1000">Canopy (5-10 pax): P1,000.00</option>
                    <option value="1500">Trellis 1</option>
                    <option value="2000">Trellis 2</option>
                    <option value="1200">Kubo</option>
                    <option value="7500">Pavilion 1</option>
                    <option value="8500">Pavilion 2</option>
                    <option value="9500">Pavilion 3</option>
                  </select>
                </div>
              </div>

              <!-- Additional Notes -->
              <!-- <div class="input-box">
                <label for="Notes">Additional Notes</label>
                <textarea
                  id="notesRoom"
                  title="AdditionalNotes"
                  name="notesroom"
                  placeholder="Type any additional notes here"
                ></textarea>
              </div> -->

              <hr class="horizontal-line" />

              <!-- Payment -->
              <!-- <div class="input-box">
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
                  </select>
                </div>
              </div> -->

              <!-- Total Cost -->
              <div class="input-box">
                <label for="TotalCost" id="tcostLabel">Total Cost</label>
                <input class="hidden" id="tcPost" name="totalCost"></input>
                <p id="totalCost">₱0</p>
              </div>

              <!-- Down Payment -->
              <div class="input-box">
                <label for="DownPayment" id="dpaymentLabel">Down Payment</label>
                <input class="hidden" id="dpPost" name="downPayment"></input>
                <p id="downPayment" name="">₱0</p>
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
          <?php elseif($type == "ROOM"): ?>
          <div class="form-container">
            <header>Reservation Details</header>
            <p>Fill out the required fields to reserve.</p>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
              <!-- Room Type -->
              <div class="input-box">
                <label for="RoomType">Room Type</label>
                <div class="select-box">
                  <select
                    title="roomtype"
                    id="roomtype"
                    name="roomtype"
                    required
                    onclick="greyOutPreviousDate()"
                  >
                    <option hidden value="">Select Room</option>
                    <option value="Couple">Couple Room (1-2 Pax)</option>
                    <option value="Family">Family Room (2-4 Pax)</option>
                  </select>
                </div>
              </div>
              <div class="hidden" id="roomRet">
                
              </div>
              
              <div class="column">
                <!-- Check-In -->
                <div class="input-box">
                  <label for="Check-In">Check-In</label>
                  <input
                    type="date"
                    id="checkin"
                    name="checkin"
                    title="Check-in"
                    placeholder="DD-MMM-YYYY"
                    onchange="computeDays()"
                  />
                </div>

                <!-- Check-Out -->
                <div class="input-box">
                  <label for="Check-Out">Check-Out</label>
                  <input
                    type="date"
                    id="checkout"
                    name="checkout"
                    title="Check-out"
                    placeholder="DD-MMM-YYYY"
                    required
                    onchange="computeDays()"
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
                    onclick="validateAdultPax()"
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
                    onclick="validateChildrenPax()"
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
                    onclick="validateSeniorPWDPax()"
                  />
                </div>
              </div>

              <!-- Additional Notes -->
              <!-- <div class="input-box">
                <label for="notes">Additional Notes</label>
                <textarea
                  id="notesSwim"
                  title="Additional Notes"
                  name="notes swim"
                  placeholder="Type any additional notes here"
                ></textarea>
              </div> -->

              <hr class="horizontal-line" />

              <!-- Total Cost -->
              <div class="input-box">
                <label for="TotalCost" id="tcostLabel">Total Cost</label>
                <input class="hidden" id="tcPost" name="totalCost"></input>
                <p id="totalCost">₱0</p>
              </div>

              <!-- Down Payment -->
              <div class="input-box">
                <label for="DownPayment" id="dpaymentLabel">Down Payment</label>
                <input class="hidden" id="dpPost" name="downPayment"></input>
                <p id="downPayment" name="">₱0</p>
              </div>

              <div class="cta-buttons">
                <a href="index.php" id="cancelButton">
                  <button type="button" class="secondary-btn">CANCEL</button>
                </a>
                <!-- <a href="paymentdetails.html" id="proceedPayment"> -->
                  <button class="primary-btn">
                    PROCEED TO PAYMENT
                  </button>
                <!-- </a> -->
              </div>
            </form>
            <!-- End of Form -->
          </div>
          <!-- End of Room Reservation -->

          <!-- Event Reservation -->
          <?php else: ?>
          <div class="form-container">
            <header>Reservation Details</header>
            <p>Fill out the required fields to reserve.</p>
            <hr class="hz-line" />
            <!-- Form -->
            <form action="" class="form" method="post">
            <div class="column">
                <!-- Venue / Area -->
                <div class="input-box">
                  <label for="VenueArea">Venue / Area</label>
                  <div class="select-box">
                    <select
                      title="venue area"
                      id="venueArea"
                      name="venuearea"
                      required
                      onchange="calculateEventTotal()"
                    >
                      <option hidden value="">Select Venue</option>
                      <option value="Function Hall">Function Hall Max Pax: 80</option>
                      <option value="Court">Court</option>
                    </select>
                  </div>
                </div>

                <!-- Pax Number -->
                <div class="input-box">
                  <label for="PaxNumber">Pax Number</label>
                  <input
                    type="number"
                    id="paxNum"
                    title="Pax Number"
                    name="PaxNumber"
                    value=""
                    size="30"
                    maxlength="50"
                    placeholder="0"
                    required
                    onclick="eventPax()"
                  />
                </div>
              </div>

              <div class="column">
                <!-- Event Date -->
                <div class="input-box">
                  <label for="Event-Date">Event Date</label>
                  <input
                    type="date"
                    id="eventDate"
                    name="eventDate"
                    title="Event Date"
                    placeholder="DD-MMM-YYYY"
                    required
                    onchange="calculateEventTotal()"
                  />
                </div>

                <!-- Event Type -->
                <!-- <div class="input-box">
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
                </div> -->
              </div>

              <div class="hidden" id="eventRet">
                
              </div>

              <!-- Additional Notes -->
              <!-- <div class="input-box">
                <label for="notes">Additional Notes</label>
                <textarea
                  id="notesSwim"
                  title="Additional Notes"
                  name="notes swim"
                  placeholder="Type any additional notes here"
                ></textarea>
              </div> -->

              <hr class="horizontal-line" />

              <!-- Total Cost -->
              <div class="input-box">
                <label for="TotalCost" id="tcostLabel">Total Cost</label>
                <input class="hidden" id="tcPost" name="totalCost"></input>
                <p id="totalCost">₱0</p>
              </div>

              <!-- Down Payment -->
              <div class="input-box">
                <label for="DownPayment" id="dpaymentLabel">Down Payment</label>
                <input class="hidden" id="dpPost" name="downPayment"></input>
                <p id="downPayment" name="">₱0</p>
              </div>

              <div class="cta-buttons">
                <a href="index.php" id="cancelButton">
                  <button type="button" class="secondary-btn">CANCEL</button>
                </a>
                <!-- <a href="paymentdetails.html" id="proceedPayment"> -->
                  <button class="primary-btn">
                    PROCEED TO PAYMENT
                  </button>
                <!-- </a> -->
              </div>
            </form>
            <!-- End of Form -->
            <?php endif; ?>
          </div>
          <!-- End of Event Reservation -->
        </div>
      </div>
    </section>
  </body>
  <script type="text/javascript">
        $(document).ready(function(){
            $("#timeSlot").on('click',function(){
                var value = $(this).val();

                $.ajax({url:"fetch.php",
                    type:"POST",
                    data:"time=" + value,
                    dataType: "html",
                    beforeSend:function(){
                        $("#timeRet").html("");
                    },
                    success:function(data){
                        // console.log(data);
                        // console.log("value:" + value);
                        $("#timeRet").html(data);
                    }
                });
            });
        });
  </script>
  <script type="text/javascript">
        $(document).ready(function(){
            $("#roomtype").on('click',function(){
                var value = $(this).val();

                $.ajax({url:"fetch.php",
                    type:"POST",
                    data:"room=" + value,
                    dataType: "html",
                    beforeSend:function(){
                        $("#roomRet").html("");
                    },
                    success:function(data){
                        // console.log(data);
                        // console.log("value:" + value);
                        $("#roomRet").html(data);
                    }
                });
            });
        });
  </script>
  <script type="text/javascript">
        $(document).ready(function(){
            $("#venueArea").on('click',function(){
                var value = $(this).val();

                $.ajax({url:"fetch.php",
                    type:"POST",
                    data:"event=" + value,
                    dataType: "html",
                    beforeSend:function(){
                        $("#eventRet").html("");
                    },
                    success:function(data){
                        // console.log(data);
                        // console.log("value:" + value);
                        $("#eventRet").html(data);
                    }
                });
            });
        });
  </script>
  <script src="script.js"></script>
</html>
