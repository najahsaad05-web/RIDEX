<?php
include("db.php");

$ride_id = $_GET['ride_id'];

$result = mysqli_query($conn, "SELECT * FROM ride WHERE ride_id=$ride_id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $fare = $_POST['fare'];
    $seats = $_POST['seats'];

    mysqli_query($conn, "
        UPDATE ride 
        SET source='$source', destination='$destination', 
            fare='$fare', available_seats='$seats'
        WHERE ride_id=$ride_id
    ");

    header("Location: my_rides.php");
}
?>

<form method="POST">
    Source: <input type="text" name="source" value="<?= $row['source'] ?>"><br>
    Destination: <input type="text" name="destination" value="<?= $row['destination'] ?>"><br>
    Fare: <input type="text" name="fare" value="<?= $row['fare'] ?>"><br>
    Seats: <input type="number" name="seats" value="<?= $row['available_seats'] ?>"><br>

    <button type="submit" name="update">Update</button>
</form>