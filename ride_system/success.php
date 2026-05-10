<?php
$booking_id = $_GET['booking_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container text-center mt-5">

    <div class="alert alert-success">
        Payment Successful 🎉
    </div>

    <h4>Booking ID: <?= $booking_id ?></h4>

    <a href="passenger_dashboard.php" class="btn btn-dark mt-3">
        ← Back to Dashboard
    </a>

</div>

</body>
</html>