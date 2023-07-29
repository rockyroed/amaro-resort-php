<?php 
session_start();
require_once "includes/dbh.inc.php";
$admin_email = $_SESSION['admin_emailaddress'];

if (isset($_GET['reservation_id'])){
  $res_id = $_GET['reservation_id'];
}

// get current date
$today = date("Y-m-d");
$DSquery = "SELECT SUM(down_payment) AS daily_sales FROM reservations WHERE DATE(reservation_date) = '$today'";
$DSresult = mysqli_query($con, $DSquery);
$DSrow = mysqli_fetch_assoc($DSresult);
$DSdaily_sales = $DSrow['daily_sales'];

// get weekly sales
$DSquery = "SELECT SUM(down_payment) AS weekly_sales FROM reservations WHERE YEARWEEK(reservation_date) = YEARWEEK(NOW())";
$DSresult = mysqli_query($con, $DSquery);
$DSrow = mysqli_fetch_assoc($DSresult);
$DSweekly_sales = $DSrow['weekly_sales'];

// get monthly sales
$DSquery = "SELECT SUM(down_payment) AS monthly_sales FROM reservations WHERE MONTH(reservation_date) = MONTH(NOW())";
$DSresult = mysqli_query($con, $DSquery);
$DSrow = mysqli_fetch_assoc($DSresult);
$DSmonthly_sales = $DSrow['monthly_sales'];

//get all reservations
$DSquery = "SELECT * from reservations WHERE reservation_id = '$res_id'";
$DSresult = mysqli_query($con, $DSquery);
$DSquery2 = "SELECT * from reservations WHERE reservation_id = '$res_id'";
$DSresult2 = mysqli_query($con, $DSquery2);
$DSrow2 = mysqli_fetch_assoc($DSresult2);
$DSreservation_type = $DSrow2['reservation_type'];



  if (isset($_POST['status'])){
    $status = $_POST['status'];
    $DSquery = "UPDATE reservations SET res_status = '$status' WHERE reservation_id = '$res_id'";
    $DSresult = mysqli_query($con, $DSquery);

    if ($status == "Visited"){
      if ($DSreservation_type == "Swimming"){
        $query = "SELECT * FROM reservations
        LEFT JOIN swimming_reservations ON reservations.reservation_id = swimming_reservations.reservation_id
        LEFT JOIN cottage_numbers ON swimming_reservations.cottage_number = cottage_numbers.cottage_number
        LEFT JOIN cottages ON cottage_numbers.cottage_id = cottages.cottage_id
        WHERE reservations.reservation_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$res_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
          if($result) {
            $cottage_id = $result["cottage_number"];
            $query = "UPDATE cottage_numbers SET reserved_check_in = NULL WHERE cottage_number = '$cottage_id'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
          }
      }
      elseif ($DSreservation_type == "Room"){
        $query = "SELECT * FROM reservations
        LEFT JOIN room_reservations ON reservations.reservation_id = room_reservations.reservation_id
        LEFT JOIN room_numbers ON room_reservations.room_number = room_numbers.room_number
        LEFT JOIN rooms ON room_numbers.room_id = rooms.room_id
        WHERE reservations.reservation_id = ?";
          $stmt = $pdo->prepare($query);
          $stmt->execute([$res_id]);
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          if($result) {
            $room_number = $result["room_number"];
            $query = "UPDATE room_numbers SET reserved_check_in = NULL,reserved_check_out = NULL WHERE room_number = '$room_number'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
          }
      }
      else{
        $query = "SELECT * FROM reservations
        LEFT JOIN event_reservations ON reservations.reservation_id = event_reservations.reservation_id
        LEFT JOIN event_venue_numbers ON event_reservations.event_venue_number = event_venue_numbers.event_venue_number
        WHERE reservations.reservation_id = ?";
          $stmt = $pdo->prepare($query);
          $stmt->execute([$res_id]);
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          if($result) {
            $event_venue_number = $result["event_venue_number"];
            $query = "UPDATE event_venue_numbers SET reserved_check_in = NULL WHERE event_venue_number = '$event_venue_number'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
          }
      }
  }
  header("Location: admin.php");
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>Edit View | Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- start of admin -->
    <section id="admin">
      <div class="admin-container">
        <div class="side-nav">
          <div class="site-logo">
            <img
              src="css/page-images/AmaroResort.png"
              alt="logo"
              class="logo"
            />
          </div>

          <div class="account">
            <i class="fas fa-user-circle"></i>
            <span><?php echo $admin_email ?></span>
          </div>

          <!-- <div class="menu-list">
            <a href="admin.php" id="dashboard">
              <button type="button" class="secondary-btn">
                <i class="fas fa-th-large"></i> DASHBOARD
              </button>

              <button type="button" class="secondary-btn">
                <i class="fas fa-concierge-bell"></i> BOOKING
              </button>
            </a>
          </div> -->

          <div class="logout">
            <a href="logout.php" id="logout-button">
              <button type="button" class="logout-btn">
                LOGOUT <i class="fas fa-sign-out-alt"></i>
              </button>
            </a>
          </div>
        </div>

        <div class="main-content">
          <div class="content">
            <h1>DASHBOARD</h1>
            <div class="dashboard">
            <div class="dashboard-row">
                <div class="dashboard-container">
                  <span>Daily Sales</span>
                  <span class="sales-price"><?php echo '₱'.$DSdaily_sales ?></span>
                  <div class="graph">
                  </div>
                </div>
                <div class="dashboard-container">
                  <span>Weekly Sales</span>
                  <span class="sales-price"><?php echo '₱'.$DSweekly_sales ?></span>
                </div>
                <div class="dashboard-container">
                  <span>Monthly Sales</span>
                  <span class="sales-price"><?php echo '₱'.$DSmonthly_sales ?></span>
                </div>
              </div>

              <!-- <div class="dashboard-container">
                <span>Weekly Sales</span>
              </div> -->
            </div>
          </div>
          <div class="content">
            <h1>BOOKINGS</h1>
            <form method="post">
            <div class="booking-table">
              <table id="bookingList">
                <tr>
                  <th>Reservation #</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th>Details</th>
                  <th>Status</th>
                  <th>Cancel</th>
                  <th>Save</th>
                </tr>
                <?php while($DSrow = mysqli_fetch_assoc($DSresult)){ ?>
                <form method="post">
                  <tr>
                  <td><?php echo $DSrow['reservation_id']?></td>
                  <td><?php echo $DSrow['reservation_type']?></td>
                  <td><?php echo $DSrow['reservation_date']?></td>
                  <td><a href="details.php?reservation_id=<?php echo $DSrow['reservation_id']?>" alt="view">View</a></td>
                  <td>
                    <select id="status" name="status" default="<?php echo $DSrow['res_status']?>">
                      <option>Pending</option>
                      <option>Paid</option>
                      <option>Visited</option>
                    </select>
                  </td>
                  <td><a href="admin.php"><button type="button" class="admin-cancel-button">Cancel</button></a></td>
                  <td><button class="admin-save-button">Save</button></td>
                </tr>
                </form>
                <?php } ?>
              </table>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end of admin   -->
    <script type="module" src="../amaro-resort-v2/javascript/admin.js"></script>
  </body>
</html>
