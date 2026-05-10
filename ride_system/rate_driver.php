<?php
session_start();
include("db.php");

if (isset($_POST['rate'])) {

    $ride_id = $_POST['ride_id'];
    $driver_id = $_POST['driver_id'];
    $user_id = $_SESSION['user_id'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    mysqli_query($conn,"
        INSERT INTO rating 
        VALUES (NULL,$ride_id,$user_id,$driver_id,$rating,'$feedback')
    ");

    echo "Rated successfully!";
}
?>

<form method="POST">
    Ride ID: <input name="ride_id"><br>
    Driver ID: <input name="driver_id"><br>
    Rating: <input name="rating"><br>
    Feedback: <input name="feedback"><br>

    <button name="rate">Submit</button>
</form>