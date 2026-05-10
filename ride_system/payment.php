<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;

if ($booking_id == 0) {
    die("Invalid booking!");
}

// fetch booking data
$dataQuery = mysqli_query($conn, "
    SELECT b.booking_id, r.fare, r.source, r.destination
    FROM booking b
    JOIN ride r ON b.ride_id = r.ride_id
    WHERE b.booking_id = $booking_id
");

$data = mysqli_fetch_assoc($dataQuery);

if (!$data) {
    die("Booking not found!");
}

$error = "";

// HANDLE PAYMENT FIRST
if (isset($_POST['pay'])) {

    $method = $_POST['method'] ?? '';

    // CARD VALIDATION
    if ($method == "card") {

        $card = trim($_POST['card_number'] ?? '');
        $expiry = trim($_POST['expiry'] ?? '');
        $cvv = trim($_POST['cvv'] ?? '');

        if (empty($card) || empty($expiry) || empty($cvv)) {
            $error = "❌ Please fill all card details!";
        }
    }

    // METHOD CHECK
    if (empty($method)) {
        $error = "❌ Please select a payment method!";
    }

    // IF NO ERROR → PROCESS PAYMENT
    if ($error == "") {

        $update = mysqli_query($conn, "
            UPDATE payment 
            SET payment_status='done'
            WHERE booking_id=$booking_id
        ");

        if (!$update) {
            die("Payment update failed: " . mysqli_error($conn));
        }

        header("Location: success.php?booking_id=$booking_id");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #0b0b0b;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-box {
            background: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            width: 450px;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>

    <script>
        function togglePayment() {
            let method = document.getElementById("method").value;
            document.getElementById("cardBox").style.display = (method === "card") ? "block" : "none";
        }
    </script>
</head>

<body>

<div class="card-box">

    <h3 class="mb-3">💳 Payment Checkout</h3>

    <p><b>Route:</b> <?= htmlspecialchars($data['source']) ?> → <?= htmlspecialchars($data['destination']) ?></p>
    <p><b>Total Amount:</b> Rs <?= $data['fare'] ?></p>

    <hr>

    <!-- ERROR MESSAGE -->
    <?php if (!empty($error)) { ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Payment Method</label>

            <select id="method" name="method" class="form-control" onchange="togglePayment()" required>
                <option value="">Select Method</option>
                <option value="cash">Cash on Ride</option>
                <option value="card">Debit/Credit Card</option>
            </select>
        </div>

        <!-- CARD BOX -->
        <div id="cardBox" style="display:none;">

            <h5 class="section-title">Card Details</h5>

            <input type="text" name="card_number" class="form-control mb-2" placeholder="Card Number">

            <input type="month" name="expiry" class="form-control mb-2">

            <input type="password" name="cvv" class="form-control mb-2" placeholder="CVV">

        </div>

        <button name="pay" class="btn btn-success w-100 mt-3">
            Confirm Payment
        </button>

        <a href="passenger_dashboard.php" class="btn btn-secondary w-100 mt-2">
            ← Back to Dashboard
        </a>

    </form>

</div>

</body>
</html>