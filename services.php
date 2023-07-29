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
    <link rel="stylesheet" href="css/services.css" />
    <link rel="icon" href="css/page-images/TabLogo.png" type="image/png" />
    <title>Services | Amaro Resort</title>
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
            Exquisite Offerings: <br>
            Discover Our Resort's Services and Amenities
          </h1>
        </div>
      </div>
    </section>
    <!-- end of header -->

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
                  Experience aquatic bliss with our comprehensive swimming services, where
                  skilled instructors offer tailored lessons for all skill levels, from beginners to
                  advanced swimmers, in our family-friendly pools and lap pool.
                </p>
                </div>
                <a href="swimming.php" id="swimBook">
                <button type="button" class="svc-btn">VIEW DETAILS</button>
                </a>
            </div>
    
            <div class="svc-type">
                <div class="room-img-container"></div>
                <div class="svctype-desc">
                <h1 class="svc-title">Hotel Room</h1>
                <p class="svc-desc">
                  Step into our inviting hotel room, where tasteful decor, a peaceful
                  ambiance, and plush bedding await to provide the perfect retreat after a
                  day of travel or exploration, ensuring you wake up refreshed and ready for
                  new adventures.
                </p>
                </div>
                <a href="hotelroom.php" id="roomBook">
                <button type="button" class="svc-btn">VIEW DETAILS</button>
                </a>
            </div>
    
            <div class="svc-type">
                <div class="event-img-container"></div>
                <div class="svctype-desc">
                <h1 class="svc-title">Event</h1>
                <p class="svc-desc">
                  Our hotel provides versatile event spaces and attentive event planning
                  services for intimate celebrations, corporate gatherings, weddings,
                  anniversaries, and professional conferences, ensuring a seamless and
                  memorable event while we take care of the details.
                </p>
                </div>
                <a href="event.php" id="eventBook">
                <button type="button" class="svc-btn">VIEW DETAILS</button>
                </a>
            </div>
          </div>
      </div>
    </section>
    <!-- end of services -->

    <!-- start of amenities -->
    <section id="amenities">
      <div class="amenities-container">
        <span class="section-name">AMENITIES</span>
        <span class="section-phrase">
          Experience the Exceptional Amenities at Amaro Resort        </span>
        <div class="amenities-content">
          <div class="categories">
            <h2>Swimming Pool</h2>
            <div class="amenities-image-container">
              <div class="facilities">
                <div class="amenities-area11"></div>
              </div>

              <div class="facilities">
                <div class="amenities-area12"></div>
              </div>
            </div>
          </div>

          <div class="categories">
            <h2>Outdoor View</h2>
            <div class="amenities-image-container">
              <div class="facilities">
                <div class="amenities-area21"></div>
              </div>

              <div class="facilities">
                <div class="amenities-area22"></div>
              </div>

              <div class="facilities">
                <div class="amenities-area23"></div>
              </div>
            </div>
          </div>

          <div class="categories">
            <h2>Dining Area</h2>
            <div class="amenities-image-container">
              <div class="facilities">
                <div class="amenities-area31"></div>
              </div>

              <div class="facilities">
                <div class="amenities-area32"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of amenities -->

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
    <script type="module" src="javascript/services.js"></script>
  </body>
</html>
