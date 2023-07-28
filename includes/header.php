<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
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

    <script type="module" src="../script.js"></script>
</body>
</html>