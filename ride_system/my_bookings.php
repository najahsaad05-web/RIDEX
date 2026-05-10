<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Passanger') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT b.*, r.source, r.destination, r.fare
        FROM booking b
        JOIN ride r ON b.ride_id = r.ride_id
        WHERE b.passanger_id=$user_id";

$result = mysqli_query($conn, $sql);
?>

<h2>My Bookings</h2>

<a href="passenger_dashboard.php">Back</a>

<table border="1">
<tr>
    <th>Route</th>
    <th>Seats</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
    <td><?= $row['source'] ?> → <?= $row['destination'] ?></td>
    <td><?= $row['seats_booked'] ?></td>
    <td><?= $row['booking_status'] ?></td>
    <td>
        <a href="payment.php?booking_id=<?= $row['booking_id'] ?>">
            Pay
        </a>
    </td>
</tr>

<?php } ?>

</table>