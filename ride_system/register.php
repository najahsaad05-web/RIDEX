<?php
include "db.php";

if (isset($_POST['register'])) {

    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $role  = $_POST['role'];

    if ($name == '' || $email == '' || $phone == '') {
        die("All fields are required!");
    }

    // Fix role mapping (your DB uses Passanger spelling)
    if ($role == "Passenger") {
        $role = "Passanger";
    }

    // check duplicate email
    $check = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        die("Email already exists!");
    }

    // generate user_id manually (because no AUTO_INCREMENT in your DB)
    $res = mysqli_query($conn, "SELECT MAX(user_id) AS maxid FROM user");
    $row = mysqli_fetch_assoc($res);
    $new_id = $row['maxid'] + 1;

    // insert user
    $sql = "INSERT INTO user (user_id, user_name, email, phone_no, role)
            VALUES ('$new_id', '$name', '$email', '$phone', '$role')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - RideX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="col-md-4 mx-auto bg-white p-4 shadow rounded">

        <h3 class="mb-3">Sign Up</h3>

        <form method="POST">

            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>

            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

            <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>

            <select name="role" class="form-control mb-3">
                <option value="Passenger">Passenger</option>
                <option value="Driver">Driver</option>
            </select>

            <button type="submit" name="register" class="btn btn-dark w-100">
                Sign Up
            </button>

        </form>

        <p class="mt-3 text-center">
            Already have an account? <a href="login.php">Login</a>
        </p>

    </div>

</div>

</body>
</html>