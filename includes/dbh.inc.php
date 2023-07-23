<?php
    $dbn = "mysql:host=localhost;dbname=amaro";
    $dbusername = "root";
    $dbpassword = "";

    try {
        $pdo = new PDO($dbn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }


    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "amaro";


    // checks if database connection is successful
    if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
        die("failed to connect!");
    }
?>
