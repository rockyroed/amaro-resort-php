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
    <link rel="stylesheet" href="css/about.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>About | Amaro Resort</title>
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
    </section>
    <!-- end of nav -->

    <!-- start of header -->
    <section id="header">
      <div class="header-container">
        <div class="header-content">
          <h1>
            Unveiling Our Resort: <br />
            Background, Mission, Vision, and FAQs
          </h1>
        </div>
      </div>
    </section>
    <!-- end of header -->

    <!-- start of background -->
    <section id="background">
      <div class="background-container">
        <span class="section-name">BACKGROUND</span>
        <span class="section-phrase">
          Amaro Resort's Captivating Origins and Legacy
        </span>
        <div class="background-content">
          <p>
            Escape to Amaro Resort, your affordable quick getaway in Metro Manila.
            Nestled in the captivating landscapes of Valenzuela, Philippines, this
            enchanting retreat offers a harmonious blend of modern luxury and
            traditional Filipino aesthetics, providing a haven of comfort and cultural
            authenticity. Indulge in the mesmerizing infinity pool, explore guided hikes
            to hidden waterfalls, and savor delectable fusion cuisine that celebrates the
            region's rich heritage. With a commitment to sustainability and community
            engagement, Amaro Resort ensures responsible tourism and preserves the
            natural beauty of Valenzuela for generations to come, creating an
            unforgettable and enriching experience for all.
          </p>
        </div>
      </div>
    </section>
    <!-- end of background -->

    <!-- start of mission and vision -->
    <section id="missionVision">
      <div class="mv-container">
        <div class="mv-content">
          <div class="mission">
            <h2>Our Mission</h2>
            <p>
              At Amaro Resort, our mission is to offer guests a serene haven where they
              can embrace nature's beauty and experience authentic Filipino hospitality.
              Through sustainable practices and community engagement, we aim to
              protect Valenzuela's natural wonders and make a positive impact on both
              the environment and the local community.
            </p>
          </div>
          <div class="vision">
            <h2>Our Vision</h2>
            <p>
              At Amaro Resort, our vision is to become Valenzuela's premier eco-friendly
              destination, celebrated for offering a harmonious experience with nature
              and genuine cultural authenticity. Through responsible and ethical practices,
              we aim to inspire guests and stakeholders to cherish the environment and
              embrace a profound connection with the rich heritage of the Philippines.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- end of mission and vision -->

    <!-- start of FAQs -->
    <!-- <section id="faqs">
      <div class="faqs-container">
        <span class="section-name">Frequently Asked Questions (FAQs)</span>
        <span class="section-phrase">
          Amaro Resort FAQs and Essential Information
        </span>
        <div class="faqs-content"></div>
      </div>
    </section> -->
    <!-- end of FAQs -->

    <!-- start of CTA -->
    <section id="cta">
      <div class="cta-bg">
        <div class="cta-content">
          <div class="cta-above">
            <h1>Experience the perfect getaway!</h1>
            <p>
              Experience the perfect getaway at our resort, offering a range of
              event packages, enticing room accommodations, and competitive
              swimming rates for an unforgettable stay.
            </p>
          </div>
          <div class="cta-below">
          <?php if ($isLoggedIn): ?>
            <a href="reservation.php" id="cta-button">
              <button type="button" class="cta-btn">Book Now</button>
            </a>
          <?php else: ?>
            <a href="login.php" id="cta-button">
              <button type="button" class="cta-btn">Book Now</button>
            </a>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <!-- end of CTA -->

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
        <script type="module" src="javascript/about.js"></script>
  </body>
</html>
