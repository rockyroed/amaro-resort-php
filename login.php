<?php
  session_start();

  if(isset($_POST["emailaddress"]) && isset($_POST["password"])) {
    $emailaddress = $_POST["emailaddress"];
    $password = $_POST["password"];

    $_SESSION['email_address'] = $emailaddress;
  
    try {
        require_once "includes/dbh.inc.php";
  
        $query = "SELECT * FROM guests WHERE email_address = ? AND password = ?";
  
        $stmt = $pdo->prepare($query);
        $stmt->execute([$emailaddress, $password]);
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
        if($result) {
            $guest_id = $result["guest_id"];
            $firstname = $result["first_name"];
            $middlename = $result["middle_name"];
            $surname = $result["last_name"];
            $phonenumber = $result["phone_number"];
            $emailaddress = $result["email_address"];
            $passwsord = $result["password"];
            $type = $result["type"];
            $creationdate = $result["creation_date"];
            $_SESSION['guest_id'] = $guest_id;
            header( "Location: index.php" ); die;
        } else {
            $error = "Cannot log in. The user is not existing or the password is incorrect. Please try again.";
        }
  
        $pdo = null;
        $stmt = null;
    } catch(PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css" />
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

    <!-- start of login -->
    <section id="login-container">
      <div class="left-side">
        <div class="left-container">
          <h1>Login to your Account</h1>
          <p>Welcome back! Please login to continue</p>
          <div class="form">
            <form action="login.php" method="post">
              <!-- Email Address -->
              <div class="input-box">
                <label for="emailAdd">Email Address</label>
                <input
                  type="email"
                  id="emailAdd"
                  title="Email Address"
                  name="emailaddress"
                  value=""
                  size="40"
                  maxlength="50"
                  placeholder="Email Address"
                  required
                />
              </div>
  
              <!-- Password -->
              <div class="input-box">
                <label for="password">Password</label>
                <input
                  type="password"
                  id="password"
                  title="Password"
                  name="password"
                  value=""
                  size="40"
                  maxlength="50"
                  placeholder="Password"
                  required
                />
              </div>
              
              <?php if (!empty($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
              <?php endif; ?>
  
              <button class="primary-btn">LOGIN</button>
            </form>

            <div class="signup-link">
              <span class="question">Don't have an account yet?</span>
              <a href="signup.php" id="signupLink">
                <span class="textlink">SIGN UP</span>
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