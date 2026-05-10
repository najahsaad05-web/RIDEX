<?php
session_start();
include("db.php");

// AUTH CHECK
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Driver') {
    header("Location: login.php");
    exit();
}

$driver_id = $_SESSION['user_id'];

// FETCH VEHICLES FOR THIS DRIVER
$vehicles = mysqli_query($conn, "SELECT * FROM vehicle WHERE driver_id = $driver_id");

// HANDLE FORM SUBMIT
if (isset($_POST['post'])) {

    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $date = $_POST['ride_date'];
    $time = $_POST['ride_time'];
    $seats = $_POST['seats'];
    $fare = $_POST['fare'];
    $vehicle_id = $_POST['vehicle_id'];

    // CHECK: vehicle must be selected
    if ($vehicle_id == "") {
        $error = "Please select a vehicle.";
    } else {

        // AUTO ride_id (safe)
        $result = mysqli_query($conn, "SELECT IFNULL(MAX(ride_id),0) AS max_id FROM ride");
        $row = mysqli_fetch_assoc($result);
        $ride_id = $row['max_id'] + 1;

        $query = "
            INSERT INTO ride 
            (ride_id, driver_id, vehicle_id, source, destination, ride_date, ride_time, available_seats, fare, status)
            VALUES
            ($ride_id, $driver_id, $vehicle_id, '$source', '$destination', '$date', '$time', $seats, $fare, 'active')
        ";

        if (mysqli_query($conn, $query)) {
            header("Location: driver_dashboard.php?success=1");
            exit();
        } else {
            $error = mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post Ride</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0b0b0b;
            color: white;
        }

        .container-box {
            max-width: 500px;
            margin: 50px auto;
            background: #1a1a1a;
            padding: 30px;
            border-radius: 12px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container-box">

    <div class="top-bar">
        <h3 class="mb-0">🚗 Post a New Ride</h3>

        <a href="driver_dashboard.php" class="btn btn-secondary btn-sm">
            ← Dashboard
        </a>
    </div>

    <!-- ERROR -->
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } ?>

    <!-- FORM -->
    <form method="POST">

        <input type="text" name="source" class="form-control mb-2" placeholder="Source" required>

        <input type="text" name="destination" class="form-control mb-2" placeholder="Destination" required>

        <input type="date" name="ride_date" class="form-control mb-2" required>

        <input type="time" name="ride_time" class="form-control mb-2" required>

        <input type="number" name="seats" class="form-control mb-2" placeholder="Available Seats" required>

        <input type="number" name="fare" class="form-control mb-2" placeholder="Fare (Rs)" required>

        <!-- VEHICLE DROPDOWN -->
        <select name="vehicle_id" class="form-control mb-3" required>

            <option value="">Select Vehicle</option>

            <?php if ($vehicles && mysqli_num_rows($vehicles) > 0) { ?>
                
                <?php while($v = mysqli_fetch_assoc($vehicles)) { ?>
                    <option value="<?= $v['vehicle_id'] ?>">
                        <?= $v['car_model'] ?> (<?= $v['plate_no'] ?>)
                    </option>
                <?php } ?>

            <?php } else { ?>

                <option value="">No vehicles available</option>

            <?php } ?>

        </select>

        <button name="post" class="btn btn-success w-100">
            Post Ride
        </button>

    </form>

</div>

</body>
</html>