<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Patient') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
</head>
<body>

<h1>Welcome Patient</h1>
<a href="view_doctors.php">View Doctors</a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>