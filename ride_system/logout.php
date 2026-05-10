<?php
session_start();

// clear session completely
$_SESSION = [];

session_unset();
session_destroy();

// redirect to login
header("Location: login.php");
exit();
?>