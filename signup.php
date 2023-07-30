<?php
session_start();

$error = "";

if (isset($_POST["emailaddress"]) && isset($_POST["password"])) {
  $firstname = $_POST["firstname"];
  $middlename = $_POST["middlename"];
  $lastname = $_POST["lastname"];
  $phonenumber = $_POST["phonenumber"];
  $emailaddress = $_POST["emailaddress"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $type = "USER";

  try {
    require_once "includes/dbh.inc.php";

    $query = "SELECT COUNT(guest_id) FROM guests WHERE email_address = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$emailaddress]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result == 0) {
      $error = "Email address is already existing. Please use another email address.";
    } else {
      $password_hash = password_hash($password, PASSWORD_BCRYPT);
      $query = "INSERT INTO guests (first_name, middle_name, last_name, phone_number, email_address, password, type)
                  VALUES (:fname, :mname, :lname, :pnumber, :email, :password, :type);";

      $stmt = $pdo->prepare($query);
      $stmt->bindParam(":fname", $firstname);
      $stmt->bindParam(":mname", $middlename);
      $stmt->bindParam(":lname", $lastname);
      $stmt->bindParam(":pnumber", $phonenumber);
      $stmt->bindParam(":email", $emailaddress);
      $stmt->bindParam(":password", $password_hash);
      $stmt->bindParam(":type", $type);
      $stmt->execute();

      $query = "SELECT * FROM guests WHERE email_address = ?";
      $stmt = $pdo->prepare($query);
      $stmt->execute([$emailaddress]);

      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($result) {
        $_SESSION['guest_id'] = $result['guest_id'];
        $_SESSION['email_address'] = $result['email_address'];
        $_SESSION['password'] = $result['password'];

        $pdo = null;
        $stmt = null;

        header("Location: index.php");
      } else {
        die("Query Failed.");
      }
    }
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
  <link rel="stylesheet" href="css/signup.css" />
  <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
  <title>Sign Up | Amaro Resort</title>
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- start of signup -->
  <section id="login-container">
    <div class="left-side">
      <div class="left-container">
        <div class="site-name" id="site-name">
          <a href="index.php" id="navlogo">
            <img src="images/AmaroResort.png" alt="logo" class="logo" />
          </a>
        </div>
        <h1>Create your Account</h1>
        <p>Sign up now to book a reservation!</p>
        <div class="form">
          <!-- Form -->
          <form action="signup.php" method="post">
            <div class="column">
              <!-- First Name -->
              <div class="input-box">
                <label for="emailAdd">First Name</label>
                <input type="text" id="firstName" title="First Name" name="firstname" value="" size="40" maxlength="50" placeholder="First Name" required />
              </div>

              <!-- Middle Name -->
              <div class="input-box">
                <label for="middleName">Middle Name</label>
                <input type="text" id="middleName" title="Middle Name" name="middlename" value="" size="40" maxlength="50" placeholder="Middle Name" />
              </div>

              <!-- Last Name -->
              <div class="input-box">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" title="Last Name" name="lastname" value="" size="40" maxlength="50" placeholder="Last Name" required />
              </div>
            </div>

            <div class="column">
              <!-- Email Address -->
              <div class="input-box">
                <label for="phoneNumber">Phone Number</label>
                <input type="telnet" id="phoneNumber" title="Phone Number" name="phonenumber" value="" size="40" maxlength="50" placeholder="Phone Number" required />
              </div>

              <!-- Email Address -->
              <div class="input-box">
                <label for="emailAdd">Email Address</label>
                <input type="email" id="emailAdd" title="Email Address" name="emailaddress" value="" size="40" maxlength="50" placeholder="Email Address" required />
              </div>
            </div>

            <!-- Password -->
            <div class="input-box">
              <label for="password">Password</label>
              <input type="password" id="password" title="Password" name="password" value="" size="40" maxlength="50" placeholder="Password" required />
            </div>

            <!-- Password -->
            <div class="input-box">
              <label for="password">Confirm Password</label>
              <input type="password" id="confirmpassword" title="Password" name="confirmpassword" value="" size="40" maxlength="50" placeholder="Password" required />
            </div>

            <?php if (!empty($error)) : ?>
              <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <button class="primary-btn">SIGN UP</button>
          </form>

          <div class="signup-link">
            <span class="question">Have an account?</span>
            <a href="login.php" id="loginLink">
              <span class="textlink">LOGIN</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="right-side">
      <div class="right-container">
        <h4>Welcome to Amaro Resort!</h4>
        <p>Your affordable quick getaway in Metro Manila.</p>
      </div>
    </div>
  </section>
  <!-- end of login -->
</body>

</html>