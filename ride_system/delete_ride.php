<?php
include("db.php");

$ride_id = $_GET['ride_id'];

// Soft delete (recommended for DBMS project)
mysqli_query($conn, "
    UPDATE ride 
    SET status = 'cancelled' 
    WHERE ride_id = $ride_id
");

header("Location: my_rides.php");
exit();
?>