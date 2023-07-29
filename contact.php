<?php
  session_start();
  if (isset($_SESSION["email_address"]) && !empty($_SESSION["email_address"])) {
    $isLoggedIn = true;
  } else {
    $isLoggedIn = false;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/contact.css" />
    <link rel="icon" href="images/TabLogo.png" type="image/png"/>
    <title>Contact | Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <section id="navBar" class="page-section active">
      <!-- start of nav -->
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
            <a class="navBar" href="about.php"> About </a>
            <a class="navBar" href="services.php"> Services </a>
            <?php if ($isLoggedIn): ?>
              <a class="navBar" href="reservation.php"> Reservation </a>
            <?php else: ?>
              <a class="navBar" href="login.php"> Reservation </a>
            <?php endif; ?>
            <a class="navBar" href="contact.php"> Contact </a>
          </div>

          <?php if ($isLoggedIn): ?>
            <a href="reservation.php" id="book-button">
              <button type="button" class="book-btn">Book Now</button>
            </a>
          <?php else: ?>
            <a href="login.php" id="book-button">
              <button type="button" class="book-btn">Book Now</button>
            </a>
          <?php endif; ?>

          <div class="vl"></div>

          <div class="mobile-button">
            <span id="user-button">
              <?php if ($isLoggedIn): ?>
                <i class="fas fa-user" id="user" title="Profile"></i>
              <?php else: ?>
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
      <!-- end of nav -->
    </section>

    <!-- start of content -->
    <div class="content">

      <div class="imagecontainer">
        <img src="images/location.png" alt="locationicon" class="custom-image">
      </div>

      <div class="address">
        <h3>Address</h3><h5>11 San Baraquiel Street, Brgy. Punturin, Valenzuela City</h5>
        
      </div>
      
      <div class="imagecon2">
        <img src="images/telephone.png" alt="telephoneicon" class="custom-image2">
      </div>

      <div class="telephone">
        <h3>Contact Numbers</h3>
        <h5>LANDLINE: 02 83667226</h5>
      </div>

      <div class="contact2">
        <h5>GLOBE: 0977 714 5122</h5>
      </div>

      <div class="contact3">
        <h5>SMART: 0947 369 1817</h5>
      </div>

      <div class="imagecon3">
        <img src="images/email.png" alt="telephoneicon" class="custom-image3">
      </div>

      <div class="mail">
        <h3>Email Address</h3>
        <h5>amaroresort@gmail.com</h5>
      </div>


      <h4>Send us a message</h4>
      <h6>We would love to hear from you! Send us a message using the contact form below.</h6>

      <input type="fname" id="fname" name="fname" placeholder="Enter your name" required>
      <input type="email" id="emailAdd" name="email" placeholder="Enter your email" required>
      <input type="message" id="message" name="message" placeholder="Enter your message" required>
     
      <a href="#" id="send-button">
        <button type="button" class="send-btn">SEND NOW</button>
      </a>
    </div>

    <div class="box">
      <h2>Our Location</h2>

    </div>

    <div class="google-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15433.960618757048!2d120.9856815!3d14.7413931!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b107a4606dcb%3A0xddff5b3356ef5b20!2sAMARO%20RESORT!5e0!3m2!1sen!2sph!4v1689492395935!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- end of content -->

    <!-- start of footer -->
    <section id="footer">
      <div class="ftr-container">
        <div class="ftr-content">
          <div class="ftr-left">
            <a href="index.php" id="footerLogo">
              <img src="images/FooterLogo.png" alt="logo" class="ftr-logo" />
            </a>
            <p class="cta-text">
              Book your unforgettable getaway now and experience the ultimate
              relaxation at our resort!
            </p>
            <div class="fb-link">
              <a href="https://www.facebook.com/amaroresort2023" id="fblink">
                <span><i class="fab fa-facebook" id="ftricon"></i></span>
                <span class="label">Amaro Resort</span>
              </a>
            </div>
            <div class="email-address">
              <a href="mailto:amaroresort@gmail.com" id="emailadd">
                <span><i class="fas fa-envelope" id="ftricon"></i></span>
                <span class="label">amaroresort@gmail.com</span>
              </a>
            </div>
          </div>

          <div class="ftr-right">
            <div class="links-label">
              <h2>Links</h2>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="reservation.php">Reservation</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </div>
            <div class="links-label">
              <h2>Legal</h2>
              <ul>
                <li><a href="privacypolicy.php">Privacy Policy</a></li>
                <li><a href="t&c.php">Terms & Conditions</a></li>
                <li><a href="rules.php">Rules and Regulations</a></li>
            </div>
            <div class="newsletter">
              <h2>Newsletter</h2>
              <p class="newsletter-text">
                Elevate your resort experience and be the first to receive exclusive promotions, 
                exciting updates, and insider insights by subscribing to our newsletter.
              </p>
              <div class="subscribe">
                <input type="email" id="email" name="email" placeholder="Enter your email" >
                <button type="submit" title="subscribe"><i class="fas fa-paper-plane" id="subButton"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright">
          Copyright © 2023. All rights reserved.
        </div>
      </div>
    </section>
    <!-- end of footer -->
    <script type="module" src="javascript/contact.js"></script>
  </body>
</html>
