<?php

session_start();
session_unset();
session_destroy();

if (isset($_GET['type'])) {
    $userType = $_GET['type'];

    if ($userType == 'admin') {
        header("Location: admin_login.php");
    } else {
        header("Location: login.php");
    }
}
