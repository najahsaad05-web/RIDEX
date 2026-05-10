<?php
session_start();
include("db.php");

// Only passengers allowed
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Passanger') {
    header("Location: login.php");
    exit();
}

$passenger_id = $_SESSION['user_id'];

// get ride id
if (!isset($_GET['ride_id'])) {
    die("Invalid ride selection");
}

$ride_id = intval($_GET['ride_id']);

// get ride details
$rideQuery = mysqli_query($conn, "SELECT * FROM ride WHERE ride_id = $ride_id");
$ride = mysqli_fetch_assoc($rideQuery);

if (!$ride) {
    die("Ride not found");
}

// check seats
if ($ride['available_seats'] < 1) {
    die("Sorry, no seats available");
}

// create booking
$booking_id_result = mysqli_query($conn, "SELECT IFNULL(MAX(booking_id),0) AS max_id FROM booking");
$row = mysqli_fetch_assoc($booking_id_result);
$booking_id = $row['max_id'] + 1;

// start transaction (important)
mysqli_begin_transaction($conn);

try {

    // 1. insert booking
    $insert = "
        INSERT INTO booking 
        (booking_id, ride_id, passanger_id, booking_type, seats_booked, booking_status, booking_time)
        VALUES
        ($booking_id, $ride_id, $passenger_id, 'carpool', 1, 'confirmed', CURTIME())
    ";

    if (!mysqli_query($conn, $insert)) {
        throw new Exception(mysqli_error($conn));
    }

    // 2. update seats safely
    $update = "
        UPDATE ride 
        SET available_seats = available_seats - 1 
        WHERE ride_id = $ride_id AND available_seats >= 1
    ";

    if (!mysqli_query($conn, $update)) {
        throw new Exception(mysqli_error($conn));
    }

    // check if update actually worked
    if (mysqli_affected_rows($conn) == 0) {
        throw new Exception("No seats available anymore");
    }

    // commit transaction
    mysqli_commit($conn);

    header("Location: passenger_dashboard.php?booked=1");
    exit();

} catch (Exception $e) {

    mysqli_rollback($conn);
    die("Booking failed: " . $e->getMessage());
}
?>