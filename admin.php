<?php
session_start();
require_once "includes/dbh.inc.php";

if (isset($_SESSION['admin_emailaddress']) && !empty($_SESSION['admin_emailaddress'])) {
  $admin_email = $_SESSION['admin_emailaddress'];
  $firstname = $_SESSION['first_name'];
  $lastname = $_SESSION['last_name'];
} else {
  header("Location: admin_login.php");
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
$DSquery = "SELECT *  FROM reservations ORDER BY reservation_date DESC";
$DSresult = mysqli_query($con, $DSquery);


if (isset($_POST['status']) && isset($_POST['statusChange'])) {
  $status = $_POST['status'];
  $reservation_id = $_POST['statusChange'];
  $DSquery = "UPDATE reservations SET status = '$status' WHERE reservation_id = '$reservation_id'";
  $DSresult = mysqli_query($con, $DSquery);
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
  <title>Admin Page | Amaro Resort</title>
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- start of admin -->
  <section id="admin">
    <div class="admin-container">
      <div class="side-nav">
        <div class="site-logo">
          <img src="css/page-images/AmaroResort.png" alt="logo" class="logo" />
        </div>

        <div class="account">
          <i class="fas fa-user-circle"></i>
          <span class="admin-details"><?php echo $firstname . " " . $lastname ?></span>
          <span class="admin-details"><?php echo $admin_email ?></span>
        </div>

        <div class="logout">
          <a href="logout.php?type=admin" id="logout-button">
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
                <span>Sales of the Day</span>
                <span class="sales-price">
                  <?php
                  if ($DSdaily_sales) {
                    echo '₱' . $DSdaily_sales;
                  } else {
                    echo '₱0';
                  }
                  ?>
                </span>
                <div class="graph">
                </div>
              </div>
              <div class="dashboard-container">
                <span>Sales of the Week</span>
                <span class="sales-price">
                  <?php
                  if ($DSweekly_sales) {
                    echo '₱' . $DSweekly_sales;
                  } else {
                    echo '₱0';
                  }
                  ?>
                </span>
              </div>
              <div class="dashboard-container">
                <span>Sales of the Month</span>
                <span class="sales-price">
                  <?php
                  if ($DSmonthly_sales) {
                    echo '₱' . $DSmonthly_sales;
                  } else {
                    echo '₱0';
                  }
                  ?>
                </span>
              </div>
            </div>

            <!-- <div class="dashboard-container">
                <span>Weekly Sales</span>
              </div> -->
          </div>
        </div>
        <div class="content">
          <h1>BOOKINGS</h1>
          <div class="booking-table">
            <table id="bookingList">
              <tr>
                <th>Reservation No.</th>
                <th>Type</th>
                <th>Date</th>
                <th>Details</th>
                <th>Status</th>
                <th>Edit</th>
              </tr>
              <?php while ($DSrow = mysqli_fetch_assoc($DSresult)) { ?>
                <tr>
                  <td><?php echo $DSrow['reservation_id'] ?></td>
                  <td><?php echo $DSrow['reservation_type'] ?></td>
                  <td><?php echo $DSrow['reservation_date'] ?></td>
                  <td><a href="details.php?reservation_id=<?php echo $DSrow['reservation_id'] ?>" alt="view">View</a></td>
                  <td><?php echo $DSrow['res_status'] ?></td>
                  <td>
                    <a href="admin_edit.php?reservation_id=<?php echo $DSrow['reservation_id'] ?>" alt="view">
                      <button>
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
          <input class="hidden" id="statusChange" name="statusChange"></input>
        </div>
      </div>
    </div>
  </section>
  <!-- end of admin   -->
  <script type="module" src="../amaro-resort-v2/javascript/admin.js"></script>
  <script>
    function status_change() {
      var status = document.getElementById("status");
      var statusChange = document.getElementById("statusChange");
      statusChange.value = status.getAttribute("title");
    }
    status_change()
  </script>
</body>

</html>