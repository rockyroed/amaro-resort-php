<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/admin_login.css" />
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
        </div>
      </div>
    </section>
    <!-- end of nav -->

    <!-- start of login -->
    <section id="login-container">
      <div class="left-side">
        <div class="left-container">
          <h1>Login to your Account</h1>
          <p>Administrator Access</p>
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
          </div>
        </div>
      </div>
    </section>
    <!-- end of login -->
  </body>
</html>
