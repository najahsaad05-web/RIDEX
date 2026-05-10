<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Driver') {
    header("Location: login.php");
    exit();
}

$driver_id = $_SESSION['user_id'];

$sql = "SELECT * FROM ride WHERE driver_id=$driver_id ORDER BY ride_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Rides</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3 class="mb-3">My Rides</h3>

    <a href="driver_dashboard.php" class="btn btn-dark mb-3">← Back</a>

    <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>Source</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Seats</th>
                <th>Fare</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?= $row['source'] ?></td>
            <td><?= $row['destination'] ?></td>
            <td><?= $row['ride_date'] ?></td>
            <td><?= $row['available_seats'] ?></td>
            <td><?= $row['fare'] ?></td>
            <td><?= $row['status'] ?></td>

            <td>
                <!-- VIEW -->
                <a href="ride_details.php?ride_id=<?= $row['ride_id'] ?>" 
                   class="btn btn-sm btn-info mb-1">
                    View
                </a>

                <!-- EDIT -->
                <a href="edit_ride.php?ride_id=<?= $row['ride_id'] ?>" 
                   class="btn btn-sm btn-warning mb-1">
                    Edit
                </a>

                <!-- DELETE -->
                <a href="delete_ride.php?ride_id=<?= $row['ride_id'] ?>" 
                   class="btn btn-sm btn-danger mb-1"
                   onclick="return confirm('Are you sure you want to delete this ride?');">
                    Delete
                </a>
            </td>
        </tr>

        <?php } ?>

        </tbody>
    </table>

</div>

</body>
</html>