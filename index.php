<?php
  session_start();

  $isLoggedIn = "";

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
    <link rel="stylesheet" href="styles.css" />
    <link rel="icon" href="images/TabLogo.png" type="image/png" />
    <title>Amaro Resort</title>
    <script
      src="https://kit.fontawesome.com/dbed6b6114.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- start of home -->
    <section id="home" class="page-section active">
      <!-- hero -->
      <div class="hero" id="hero">
        <div class="site-nav">
          <div class="site-name" id="site-name">
            <a href="index.php" id="navlogo">
              <img src="images/AmaroResort.png" alt="logo" class="logo" />
            </a>
          </div>
          <div class="nav-bar" id="navbar">
            <a class="navBar" href="index.php"> Home </a>
            <a class="navBar" href="about.html"> About </a>
            <a class="navBar" href="services.html"> Services </a>
            <a class="navBar" href="reservation.html"> Reservation </a>
            <a class="navBar" href="contact.html"> Contact </a>
          </div>

          <?php if ($isLoggedIn): ?>
            <a href="reservation.html" id="book-button">
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
            <a href="account.html"><i class="fas fa-user-edit"></i>Account</a>
            <a href="login.html"><i class="fas fa-sign-out-alt"></i>Logout</a>
          </div>
        </div>
        <div class="head-bottom flex">
          <h1>Your affordable quick getaway in Metro Manila!</h1>
          <p>
            Escape to our Metro Manila oasis and enjoy our resort's enticing
            offerings, including room accommodations, a versatile event area for
            memorable occasions, and a refreshing swimming pool.
          </p>
          <?php if ($isLoggedIn): ?>
            <a href="reservation.html" id="check-menu">
              <button type="button" class="head-btn">BOOK NOW</button>
            </a>
          <?php else: ?>
            <a href="login.php" id="check-menu">
              <button type="button" class="head-btn">BOOK NOW</button>
            </a>
          <?php endif; ?>
        </div>
      </div>
      <!-- end of hero -->
    </section>
    <!-- end of home -->

    <!-- start of quick-book -->
    <!-- <section id="quick-book">
      <div class="container-flex">
        <div class="input-grid">
          <div class="box">
            <label>Check-in:</label> <br />
            <input type="date" placeholder="Check-in-Date" />
          </div>
          <div class="box">
            <label>Check-out:</label> <br />
            <input type="date" placeholder="Check-out-Date" />
          </div>
          <div class="box">
            <label>Adult:</label> <br />
            <input type="number" placeholder="0" />
          </div>
          <div class="box">
            <label>Children:</label> <br />
            <input type="number" placeholder="0" />
          </div>
        </div>
        <div class="search">
          <input type="submit" name="" value="See Availability" />
        </div>
      </div>
    </section> -->
    <!-- end of quick-book -->

    <!-- start of services -->
    <section id="services">
      <div class="svc-container">
        <span class="section-name">OUR SERVICES</span>
        <span class="section-phrase">Experience Our Exceptional Services</span>
        <div class="svc-options">
          <div class="svc-type">
            <div class="swim-img-container"></div>
            <div class="svctype-desc">
              <h1 class="svc-title">Swimming</h1>
              <p class="svc-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Curabitur faucibus sapien viverra leo dignissim tincidunt. Sed
                in lectus ante.
              </p>
            </div>
            <a href="swimming.html" id="swimBook">
              <button type="button" class="svc-btn">VIEW DETAILS</button>
            </a>
          </div>

          <div class="svc-type">
            <div class="room-img-container"></div>
            <div class="svctype-desc">
              <h1 class="svc-title">Hotel Room</h1>
              <p class="svc-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Curabitur faucibus sapien viverra leo dignissim tincidunt. Sed
                in lectus ante.
              </p>
            </div>
            <a href="hotelroom.html" id="roomBook">
              <button type="button" class="svc-btn">VIEW DETAILS</button>
            </a>
          </div>

          <div class="svc-type">
            <div class="event-img-container"></div>
            <div class="svctype-desc">
              <h1 class="svc-title">Event</h1>
              <p class="svc-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Curabitur faucibus sapien viverra leo dignissim tincidunt. Sed
                in lectus ante.
              </p>
            </div>
            <a href="event.html" id="eventBook">
              <button type="button" class="svc-btn">VIEW DETAILS</button>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end of services -->

    <!-- start of about -->
    <section id="about">
      <div class="about-container">
        <span class="section-name">ABOUT US</span>
        <span class="section-phrase">Discover the Essence of Our Resort</span>
        <div class="content">
          <div class="left-content">
            <div class="abt-preview">
              <h1 class="headline">
                Discover Serenity and Bliss in Our Tranquil Enclave: Your
                Gateway to Unforgettable Experiences
              </h1>
              <p class="short-preview">
                Unwind, relax, and reconnect with yourself amidst the serene
                surroundings of our resort. Welcome to your gateway to serenity,
                where cherished memories are waiting to be created.
              </p>
            </div>
            <a href="about.html" id="aboutUs">
              <button type="button" class="abt-btn">KNOW MORE</button>
            </a>
          </div>
          <div class="right-content">
            <div class="slideshow">
              <div class="slide-image"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of about -->

    <!-- start of feedbacks -->
    <section id="feedbacks">
      <div class="feedbacks-container">
        <span class="section-name">FEEDBACKS</span>
        <span class="section-phrase">
          Delighted Guests Speak: Reviews and Testimonials
        </span>
        <div class="feedbacks-list">
          <div class="customer">
            <img src="images/User.png" alt="customer image" />

            <div class="rating">
              <span><i class="fas fa-star" id="star"></i></span>
              <span><i class="fas fa-star" id="star"></i></span>
              <span><i class="fas fa-star" id="star"></i></span>
              <span><i class="fas fa-star" id="star"></i></span>
              <span><i class="fas fa-star" id="star"></i></span>
            </div>

            <h3>Aimee Cruz</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
              faucibus sapien viverra leo dignissim tincidunt. Sed in lectus
              ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Curabitur faucibus sapien viverra leo dignissim tincidunt. Sed in
              lectus ante.
            </p>
          </div>

          <div class="customer">
            <img src="images/User.png" alt="customer image" />

            <div class="rating">
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
            </div>

            <h3>Aimee Cruz</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
              faucibus sapien viverra leo dignissim tincidunt. Sed in lectus
              ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Curabitur faucibus sapien viverra leo dignissim tincidunt. Sed in
              lectus ante.
            </p>
          </div>
          <div class="customer">
            <img src="images/User.png" alt="customer image" />

            <div class="rating">
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
            </div>

            <h3>Aimee Cruz</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
              faucibus sapien viverra leo dignissim tincidunt. Sed in lectus
              ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Curabitur faucibus sapien viverra leo dignissim tincidunt. Sed in
              lectus ante.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- end of feedbacks -->

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
              <a href="reservation.html" id="cta-button">
                <button type="button" class="cta-btn">BOOK NOW</button>
              </a>
            <?php else: ?>
              <a href="login.php" id="cta-button">
                <button type="button" class="cta-btn">BOOK NOW</button>
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
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="reservation.html">Reservation</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </div>
            <div class="links-label">
              <h2>Legal</h2>
              <ul>
                <li><a href="privacypolicy.html">Privacy Policy</a></li>
                <li><a href="t&c.html">Terms & Conditions</a></li>
                <li><a href="rules.html">Rules and Regulations</a></li>
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

    <script type="module" src="script.js"></script>
  </body>
</html>
