<?php
session_start();
include("db.php");

// Only logged-in passengers allowed
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Passanger') {
    header("Location: login.php");
    exit();
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">

<h3 class="mb-3">Available Rides</h3>

<div class="row">

<?php
$result = mysqli_query($conn, "SELECT * FROM ride WHERE status='active'");

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    echo "<p class='text-muted'>No rides available at the moment.</p>";
}

while($row = mysqli_fetch_assoc($result)){
?>

<div class="col-md-4 mb-3">

  <div class="card p-3 shadow-sm">

    <h5>
        🚗 <?php echo htmlspecialchars($row['source']); ?> →
        <?php echo htmlspecialchars($row['destination']); ?>
    </h5>

    <p class="text-muted">
        📅 <?php echo $row['ride_date']; ?> |
        ⏰ <?php echo $row['ride_time']; ?>
    </p>

    <h6>💰 Rs <?php echo $row['fare']; ?></h6>

    <p>
        Seats left:
        <b><?php echo $row['available_seats']; ?></b>
    </p>

    <?php if ($row['available_seats'] > 0) { ?>
        <a href="book.php?ride_id=<?= $row['ride_id'] ?>" 
   class="btn btn-dark w-100 mt-2">
   Book Ride
</a>
    <?php } else { ?>
        <button class="btn btn-secondary w-100" disabled>Full</button>
    <?php } ?>

  </div>

</div>

<?php } ?>

</div>
</div>