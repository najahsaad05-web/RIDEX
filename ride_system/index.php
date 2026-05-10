<!DOCTYPE html>
<html>
<head>
    <title>RideX - Smart Ride Sharing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #0b0b0b, #1c1c1c);
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            padding: 20px 80px;
        }

        .hero {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 80px;
        }

        .hero h1 {
            font-size: 65px;
            font-weight: 800;
        }

        .hero p {
            font-size: 18px;
        }

        .btn-main {
            padding: 12px 25px;
            border-radius: 10px;
            margin-right: 10px;
        }

        .highlight {
            color: #ffc107;
        }

        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
                text-align: center;
                padding: 40px;
            }

            .navbar {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark">
    <h3>Ride<span class="highlight">X</span></h3>
</nav>

<!-- HERO -->
<div class="hero">
    <div>
        <h1>Ride Smarter,<br>Travel Faster</h1>
        <p class="text-secondary mt-3">
            Book rides instantly, share trips, and save cost with carpooling.
        </p>

        <a href="login.php" class="btn btn-warning btn-main mt-3">Login</a>
        <a href="register.php" class="btn btn-outline-light btn-main mt-3">Sign Up</a>
    </div>
</div>

</body>
</html>