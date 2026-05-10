<?php
include("db.php");

$ride_id = $_GET['ride_id'];

$ride = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM ride WHERE ride_id=$ride_id"));

$bookings = mysqli_query($conn,"
SELECT b.*, u.user_name
FROM booking b
JOIN user u ON b.passanger_id = u.user_id
WHERE b.ride_id=$ride_id
");
?>

<h2>Ride Details</h2>

<p><b>Route:</b> <?= $ride['source'] ?> → <?= $ride['destination'] ?></p>
<p><b>Status:</b> <?= $ride['status'] ?></p>

<h3>Passengers</h3>

<table border="1">
<tr>
    <th>Name</th>
    <th>Seats</th>
    <th>Status</th>
</tr>

<?php while($b = mysqli_fetch_assoc($bookings)) { ?>
<tr>
    <td><?= $b['user_name'] ?></td>
    <td><?= $b['seats_booked'] ?></td>
    <td><?= $b['booking_status'] ?></td>
</tr>
<?php } ?>

</table>