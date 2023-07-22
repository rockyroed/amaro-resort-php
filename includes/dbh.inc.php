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
