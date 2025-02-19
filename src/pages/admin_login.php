<?php
session_start();
require_once "../includes/dbh.inc.php";
$error = "";

if (isset($_POST['emailaddress']) && isset($_POST['password'])) {
  $emailaddress = $_POST['emailaddress'];
  $password = $_POST['password'];

  try {
    require_once "../includes/dbh.inc.php";

    $query = "SELECT * FROM admins WHERE email_address = ?";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$emailaddress]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
      $password_hash = $result['password'];
      if (password_verify($password, $password_hash)) {
        $admin_id = $result["admin_id"];
        $firstname = $result["first_name"];
        $middlename = $result["middle_name"];
        $lastname = $result["last_name"];
        $phonenumber = $result["phone_number"];
        $emailaddress = $result["email_address"];
        $passwsord = $result["password"];
        $type = $result["type"];
        $creationdate = $result["creation_date"];
        $_SESSION['admin_emailaddress'] = $emailaddress;
        $_SESSION['first_name'] = $firstname;
        $_SESSION['last_name'] = $lastname;
        header("Location: admin.php");
        die;
      } else {
        $error = "Cannot log in. The password is incorrect. Please try again.";
      }
    } else {
      $error = "Cannot log in. The email address is not existing. Please try again.";
    }

    $pdo = null;
    $stmt = null;
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
  <link rel="stylesheet" href="../css/admin_login.css" />
  <link rel="icon" href="../css/page-images/TabLogo.png" type="image/png" />
  <title>Admin Login | Amaro Resort</title>
  <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- start of nav -->
  <section id="navBar" class="page-section active">
    <div class="nav" id="nav">
      <div class="site-nav">
        <div class="site-name" id="site-name">
          <a href="../../index.php" id="navlogo">
            <img src="../css/page-images/AmaroResort.png" alt="logo" class="logo" />
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
          <form method="post">
            <!-- Email Address -->
            <div class="input-box">
              <label for="emailAdd">Email Address</label>
              <input type="email" id="emailAdd" title="Email Address" name="emailaddress" value="" size="40" maxlength="50" placeholder="Email Address" required />
            </div>

            <!-- Password -->
            <div class="input-box">
              <label for="password">Password</label>
              <input type="password" id="password" title="Password" name="password" value="" size="40" maxlength="50" placeholder="Password" required />
            </div>

            <?php if (!empty($error)) : ?>
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