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

if (isset($_POST['room'])){
        
        $room = $_POST['room'];
    
        $query = "SELECT * FROM `rooms` WHERE `room_type` = '$room'";
        $roomRes = mysqli_query($con, $query);
        while($roomRow = mysqli_fetch_assoc($roomRes)){
            $roomType = $roomRow['room_type'];
            $maxPax = $roomRow['pax_max'];
            $minPax = $roomRow['pax_min'];
            $roomPrice = $roomRow['price'];
            echo "<input type='hidden' name=room.price id=room.price value='$roomPrice'>";
            echo "<input type='hidden' name='room' id='room' value='$roomType'>";
            echo "<input type='hidden' name='room.maxPax' id='room.maxPax' value='$maxPax'>";
            echo "<input type='hidden' name='room.minPax' id='room.minPax' value='$minPax'>";
        }
}

if (isset($_POST['event'])){
        
    $event = $_POST['event'];

    $query = "SELECT * FROM `event_venues` WHERE `event_type` = '$event'";
    $eventRes = mysqli_query($con, $query);
    while($eventRow = mysqli_fetch_assoc($eventRes)){
        $eventType = $eventRow['event_type'];
        $eventPrice = $eventRow['price'];
        $eventMinPax = $eventRow['pax_min'];
        $eventMaxPax = $eventRow['pax_max'];
        echo "<input type='hidden' name=event.price id=event.price value='$eventPrice'>";
        echo "<input type='hidden' name='event' id='event' value='$eventType'>";
        echo "<input type='hidden' name='event.maxPax' id='event.maxPax' value='$eventMaxPax'>";
        echo "<input type='hidden' name='event.minPax' id='event.minPax' value='$eventMinPax'>";
    }
}
?>


