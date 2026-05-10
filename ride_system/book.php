<?php
session_start();
include("db.php");

// check login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Passanger') {
    header("Location: login.php");
    exit();
}

$ride_id = $_GET['ride_id'];
$passenger_id = $_SESSION['user_id'];

// fetch ride
$rideQuery = mysqli_query($conn, "
    SELECT * FROM ride 
    WHERE ride_id = $ride_id AND status = 'active'
");

$ride = mysqli_fetch_assoc($rideQuery);

if (!$ride) {
    die("Ride not found!");
}

// check seats
if ($ride['available_seats'] <= 0) {
    die("No seats available!");
}

// start transaction
mysqli_begin_transaction($conn);

try {

    // 1. reduce seats
    mysqli_query($conn, "
        UPDATE ride 
        SET available_seats = available_seats - 1 
        WHERE ride_id = $ride_id AND available_seats > 0
    ");

    if (mysqli_affected_rows($conn) == 0) {
        throw new Exception("Seat update failed");
    }

    // 2. create booking
    $booking_id = rand(1000, 9999);

    mysqli_query($conn, "
        INSERT INTO booking 
        (booking_id, ride_id, passanger_id, booking_type, seats_booked, booking_status, booking_time)
        VALUES 
        ($booking_id, $ride_id, $passenger_id, 'carpool', 1, 'confirmed', CURTIME())
    ");

    // 3. commit
    mysqli_commit($conn);

    // 4. redirect to payment (FIXED PROPERLY)
    echo "<script>
        window.location.href = 'payment.php?booking_id=" . $booking_id . "';
    </script>";
    exit();

} catch (Exception $e) {

    mysqli_rollback($conn);

    echo "<script>
        alert('Booking failed. Please try again.');
        window.location='passenger_dashboard.php';
    </script>";
}
?>