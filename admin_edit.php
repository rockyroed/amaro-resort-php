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


if (isset($_POST['status'])){
  $status = $_POST['status'];
  $DSquery = "UPDATE reservations SET res_status = '$status' WHERE reservation_id = '$res_id'";
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
    <title>Amaro Resort</title>
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
                  <span><?php echo '₱'.$DSdaily_sales ?></span>
                  <div class="graph">
                    <canvas
                      id="myChart"
                      style="width: 100%; max-width: 600px"
                    ></canvas>
                  </div>
                </div>
                <div class="dashboard-container">
                  <span>Weekly Sales</span>
                  <span><?php echo '₱'.$DSweekly_sales ?></span>
                </div>
                <div class="dashboard-container">
                  <span>Monthly Sales</span>
                  <span><?php echo '₱'.$DSmonthly_sales ?></span>
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
                <tr>
                  <td><?php echo $DSrow['reservation_id']?></td>
                  <td><?php echo $DSrow['reservation_type']?></td>
                  <td><?php echo $DSrow['reservation_date']?></td>
                  <td><a href="#" alt="view">view</a></td>
                  <td>
                    <select id="status" name="status" default="<?php echo $DSrow['res_status']?>">
                      <option>Pending</option>
                      <option>Paid</option>
                      <option>Visited</option>
                    </select>
                  </td>
                  <td><a href="admin.php"><button type="button">Cancel</button></a></td>
                  <td><button>Save</button></td>
                </tr>
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
