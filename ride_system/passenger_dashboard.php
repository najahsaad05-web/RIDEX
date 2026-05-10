<?php
session_start();
include("db.php");

// SECURITY CHECK
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Passanger') {
    header("Location: login.php");
    exit();
}

$passenger_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Passenger Dashboard - RideX</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial;
        }

        .navbar {
            background: #111;
            color: white;
            padding: 15px 30px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .ride-title {
            font-weight: bold;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <h4>RideX Passenger Panel</h4>
    <div>
        Welcome, <?php echo $_SESSION['user_name']; ?> |
        <a href="logout.php" class="text-warning">Logout</a>
    </div>
</div>

<div class="container mt-4">

<h3 class="mb-4">Available Rides</h3>

<div class="row">

<?php
$sql = "SELECT * FROM ride WHERE status='active' ORDER BY ride_date ASC";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
?>

<div class="col-md-4 mb-3">

    <div class="card p-3">

        <h5 class="ride-title">
            <?php echo htmlspecialchars($row['source']); ?> → 
            <?php echo htmlspecialchars($row['destination']); ?>
        </h5>

        <p>
            📅 <?php echo $row['ride_date']; ?> <br>
            ⏰ <?php echo $row['ride_time']; ?>
        </p>

        <p>💰 Fare: Rs <?php echo $row['fare']; ?></p>
        <p>🪑 Seats Available: <?php echo $row['available_seats']; ?></p>

        <?php if ($row['available_seats'] > 0) { ?>
            <a href="book.php?ride_id=<?php echo $row['ride_id']; ?>" class="btn btn-dark btn-sm">
                Book Ride
            </a>
        <?php } else { ?>
            <button class="btn btn-secondary btn-sm" disabled>Full</button>
        <?php } ?>

    </div>

</div>

<?php } ?>

</div>
</div>

</body>
</html>