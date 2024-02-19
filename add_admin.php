<?php
require_once "includes/dbh.inc.php";

$password_hash = password_hash("test_password", PASSWORD_BCRYPT);
$query = "INSERT INTO admins (first_name, middle_name, last_name, phone_number, email_address, password, type)
            VALUES (:fname, :mname, :lname, :pnumber, :email, :password, :type);";

$firstname = "Christian Roed";
$middlename = "Panes";
$lastname = "Boyles";
$phonenumber = "09685768495";
$emailaddress = "chrstnrdbyls@gmail.com";
$type = "User";

$stmt = $pdo->prepare($query);
$stmt->bindParam(":fname", $firstname);
$stmt->bindParam(":mname", $middlename);
$stmt->bindParam(":lname", $lastname);
$stmt->bindParam(":pnumber", $phonenumber);
$stmt->bindParam(":email", $emailaddress);
$stmt->bindParam(":password", $password_hash);
$stmt->bindParam(":type", $type);
$stmt->execute();
?>