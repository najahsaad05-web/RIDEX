<?php
session_start();
include("db.php");

if (isset($_POST['login'])) {

    $email = $_POST['email'];

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['role'] = $row['role'];

        if ($row['role'] == "Driver") {
            header("Location: driver_dashboard.php");
            exit();
        } else {
            header("Location: passenger_dashboard.php");
            exit();
        }

    } else {
        $error = "Invalid email address";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>RideX Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            background: #f5f5f5;
        }

        /* LEFT PANEL (ABOUT SECTION) */
        .left-panel {
            flex: 1;
            background: linear-gradient(120deg, #111, #2b2b2b);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 80px;
        }

        .left-panel h1 {
            font-size: 42px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .left-panel p {
            font-size: 15px;
            line-height: 1.7;
            color: #d1d5db;
            max-width: 400px;
        }

        .stats {
            margin-top: 30px;
            font-size: 14px;
            color: #9ca3af;
        }

        /* RIGHT PANEL (LOGIN BOX) */
        .right-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff;
        }

        .login-box {
            width: 360px;
            padding: 40px;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            background: #fff;
        }

        .logo {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #111;
        }

        .subtitle {
            font-size: 13px;
            color: #666;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #d1d5db;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #111;
            box-shadow: none;
        }

        .btn-login {
            width: 100%;
            background: #111;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: 500;
        }

        .btn-login:hover {
            background: #000;
        }

        .error {
            background: #f3f3f3;
            color: #111;
            padding: 8px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 13px;
            border: 1px solid #ddd;
        }

        a {
            color: #111;
            font-size: 13px;
        }

        .footer-text {
            font-size: 12px;
            color: #777;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>

<body>

<!-- LEFT INFO PANEL -->
<div class="left-panel">

    <h1>RideX</h1>

    <p>
        A modern ride-sharing platform connecting drivers and passengers
        seamlessly across cities. Safe, reliable, and efficient travel
        at your fingertips.
    </p>

    <div class="stats">
        ✔ Real-time ride matching <br>
        ✔ Secure payments <br>
        ✔ Trusted driver network
    </div>

</div>

<!-- RIGHT LOGIN PANEL -->
<div class="right-panel">

    <div class="login-box">

        <div class="logo">Sign In</div>
        <div class="subtitle">Access your RideX account</div>

        <?php if (isset($error)) { ?>
            <div class="error"><?= $error ?></div>
        <?php } ?>

        <form method="POST">

            <input type="email" name="email" class="form-control mb-3" placeholder="Email address" required>

            <button type="submit" name="login" class="btn btn-login">
                Login
            </button>

        </form>

        <div class="footer-text">
            Don’t have an account? <a href="register.php">Create one</a>
        </div>

    </div>

</div>

</body>
</html>