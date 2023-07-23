<?php
session_start();
require_once "includes/dbh.inc.php";

if (isset($_POST['time'])){
    
    $time = $_POST['time'];

    $query = "SELECT * FROM `swimming_prices` WHERE `chosen_hour` = '$time'";
    $timeRes = mysqli_query($con, $query);
    while($timeRow = mysqli_fetch_assoc($timeRes)){
        $guest = $timeRow['guest_type'];
        $price = $timeRow['price'];
        echo "<input type='hidden' name=$guest.price id=$guest.price value='$price'>";
        echo "<input type='hidden' name='$guest' id='$guest' value='$guest'>";
    }
    echo "<input type='hidden' name='DayValue' value='$time'>";
    


}
?>


