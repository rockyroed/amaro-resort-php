<!--
  Program Title: Amaro Resort Online Reservation System

  Date Written: July 23, 2023
  Date Revised: February 20, 2024

  Programmers
    - Boyles, Christian Roed P.
    - Erandio, Trisha Mae M.
    - Francisco, John Rey P.
    - Mamansag, John Michael Vincent

  Where the program fits in the general system designs
    This system is a comprehensive solution to enhance the guest experience and streamline
    the reservation process within the hospitality industry. It integrates various subsystems
    and functionalities, including accommodation booking, activity scheduling, event planning,
    and secure payment processing, into a cohesive and user-friendly online platform.

  Purpose
    The general objective of the Online Reservation System for Amaro Resort is to enhance the
    guest experience by providing a user-friendly and efficient platform for online reservations.

  Data Structures, Algorithms, and Control:
    - Data Structures
        - This system makes use of session storage, which offers a means to temporarily organize
        and store data. Each entry in session storage consists of a key-value pair, representing
        a data piece that users can access and modify while interacting with the webpage.
    - Algorithms
        - The system employs a hashing algorithm, specifically PASSWORD_BCRYPT in PHP, to securely
        hash user passwords. This algorithm transforms the passwords into irreversible and unique
        hash values, providing an added layer of protection against unauthorized access. By utilizing
        PASSWORD_BCRYPT, the system ensures that passwords are securely stored in a manner that makes
        it extremely difficult for attackers to decipher the original passwords even if they gain
        access to the hashed values. This approach enhances the overall security of the system,
        safeguarding sensitive user information from potential threats.
    - Control
        - Validate Pax Number
            - Checks for the pax number if it's equal or less than the cottage type selected, to make
            sure that the requirements are matched.
-->

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
  <link rel="stylesheet" href="./src/css/styles.css" />
  <link rel="icon" href="./src/assets/TabLogo.png" type="image/png" />
  <title>Amaro Resort</title>
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- start of home -->
  <section id="home" class="page-section active">
    <!-- hero -->
    <div class="hero" id="hero">
      <div class="site-nav">
        <div class="site-name" id="site-name">
          <a href="index.php" id="navlogo">
            <img src="./src/assets/AmaroResort.png" alt="logo" class="logo" />
          </a>
        </div>
        <div class="nav-bar" id="navbar">
          <a class="navBar" href="index.php"> Home </a>
          <a class="navBar" href="./src/pages/about.php"> About </a>
          <a class="navBar" href="./src/pages/services.php"> Services </a>
          <?php if ($isLoggedIn) : ?>
            <a class="navBar" href="./src/pages/reservation.php"> Reservation </a>
          <?php else : ?>
            <a class="navBar" href="./src/pages/login.php"> Reservation </a>
          <?php endif; ?>
          <a class="navBar" href="./src/pages/contact.php"> Contact </a>
        </div>

        <?php if ($isLoggedIn) : ?>
          <a href="./src/pages/reservation.php" id="book-button">
            <button type="button" class="book-btn">Book Now</button>
          </a>
        <?php else : ?>
          <a href="./src/pages/login.php" id="book-button">
            <button type="button" class="book-btn">Book Now</button>
          </a>
        <?php endif; ?>

        <div class="vl"></div>

        <div class="mobile-button">
          <span id="user-button">
            <?php if ($isLoggedIn) : ?>
              <i class="fas fa-user" id="user" title="Profile"></i>
            <?php else : ?>
              <a href="./src/pages/login.php">
                <i class="fas fa-sign-in-alt" id="user" title="Log In"></i>
              </a>
            <?php endif; ?>
          </span>

          <span id="menu-bar">
            <i class="fas fa-bars" id="main-menu"></i>
          </span>
        </div>


        <div class="account-menu" id="account-menu">
          <a href="./src/pages/account.php"><i class="fas fa-user-edit"></i>Account</a>
          <a href="./src/pages/logout.php?type=guest"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
      </div>
      <div class="head-bottom flex">
        <h1>Your affordable quick getaway in Metro Manila!</h1>
        <p>
          Escape to our Metro Manila oasis and enjoy our resort's enticing
          offerings, including room accommodations, a versatile event area for
          memorable occasions, and a refreshing swimming pool.
        </p>
        <?php if ($isLoggedIn) : ?>
          <a href="./src/pages/reservation.php" id="check-menu">
            <button type="button" class="head-btn">BOOK NOW</button>
          </a>
        <?php else : ?>
          <a href="./src/pages/login.php" id="check-menu">
            <button type="button" class="head-btn">BOOK NOW</button>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <!-- end of hero -->
  </section>
  <!-- end of home -->

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
          <a href="./src/pages/swimming.php" id="swimBook">
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
          <a href="./src/pages/hotelroom.php" id="roomBook">
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
          <a href="./src/pages/event.php" id="eventBook">
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
          <a href="./src/pages/about.php" id="aboutUs">
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
          <img src="./src/assets/profile-icon.jpg" alt="customer image" />

          <div class="rating">
            <span><i class="fas fa-star" id="star"></i></span>
            <span><i class="fas fa-star" id="star"></i></span>
            <span><i class="fas fa-star" id="star"></i></span>
            <span><i class="fas fa-star" id="star"></i></span>
            <span><i class="fas fa-star" id="star"></i></span>
          </div>

          <h3>Aimee Cruz</h3>
          <p>
            The resort grounds were impeccably maintained, and the lush gardens and pristine
            beachfront created a true tropical paradise. I spent hours just lounging by the pool, soaking
            in the sun.
          </p>
        </div>

        <div class="customer">
          <img src="./src/assets/profile-icon.jpg" alt="customer image" />

          <div class="rating">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
          </div>

          <h3>John Doe</h3>
          <p>
            Had an amazing time at the resort! Beautiful location, friendly staff, and excellent
            amenities. Will definitely be back!
          </p>
        </div>
        <div class="customer">
          <img src="./src/assets/profile-icon.jpg" alt="customer image" />

          <div class="rating">
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
            <span><i class="fas fa-star"></i></span>
          </div>

          <h3>Finn Steiner</h3>
          <p>
            The resort exceeded all expectations. The rooms were comfortable, the food was
            delicious, and the beach was stunning. Highly recommend it!
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
          <?php if ($isLoggedIn) : ?>
            <a href="./src/pages/reservation.php" id="cta-button">
              <button type="button" class="cta-btn">BOOK NOW</button>
            </a>
          <?php else : ?>
            <a href="./src/pages/login.php" id="cta-button">
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
            <img src="./src/assets/FooterLogo.png" alt="logo" class="ftr-logo" />
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
              <li><a href="./src/pages/about.php">About</a></li>
              <li><a href="./src/pages/services.php">Services</a></li>
              <li><a href="./src/pages/reservation.php">Reservation</a></li>
              <li><a href="./src/pages/contact.php">Contact</a></li>
            </ul>
          </div>
          <div class="links-label">
            <h2>Legal</h2>
            <ul>
              <li><a href="./src/pages/privacypolicy.php">Privacy Policy</a></li>
              <li><a href="t&./src/pages/c.php">Terms & Conditions</a></li>
              <li><a href="./src/pages/rules.php">Rules and Regulations</a></li>
          </div>
          <div class="newsletter">
            <h2>Newsletter</h2>
            <p class="newsletter-text">
              Elevate your resort experience and be the first to receive exclusive promotions,
              exciting updates, and insider insights by subscribing to our newsletter.
            </p>
            <div class="subscribe">
              <input type="email" id="email" name="email" placeholder="Enter your email">
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