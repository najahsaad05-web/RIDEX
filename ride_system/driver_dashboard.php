<?php
session_start();
include("db.php");

// security check
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Driver') {
    header("Location: login.php");
    exit();
}

$driver_id = $_SESSION['user_id'];

// driver info
$user = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT * FROM user WHERE user_id = $driver_id"
));

// stats
$totalRides = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM ride WHERE driver_id = $driver_id"
))['total'];

$activeRides = mysqli_fetch_assoc(mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM ride WHERE driver_id = $driver_id AND status='active'"
))['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Driver Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0b0b0b;
            color: white;
        }

        .card-box {
            background: #1a1a1a;
            padding: 20px;
            border-radius: 12px;
        }

        .btn-custom {
            width: 100%;
            margin-top: 10px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <h2>Welcome, <?= htmlspecialchars($user['user_name']) ?> 🚗</h2>
    <p class="text-secondary">Driver Dashboard</p>

    <!-- SUCCESS MESSAGE AFTER POST -->
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success">
            Ride posted successfully!
        </div>
    <?php } ?>

    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card-box text-center">
                <h4><?= $totalRides ?></h4>
                <p>Total Rides Posted</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-box text-center">
                <h4><?= $activeRides ?></h4>
                <p>Active Rides</p>
            </div>
        </div>

    </div>

    <div class="card-box">

        <h4>Quick Actions</h4>

        <a href="post_ride.php" class="btn btn-success btn-custom">
            + Post New Ride
        </a>

        <a href="my_rides.php" class="btn btn-info btn-custom">
            View My Rides
        </a>

        <!-- FIXED LOGOUT PATH -->
        <a href="logout.php" class="btn btn-danger btn-custom">
            Logout
        </a>

    </div>

</div>

</body>
</html>