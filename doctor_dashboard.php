<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Doctor') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
</head>
<body>

<h1>Welcome Doctor</h1>
<a href="view_request.php?doctor_id=<?php echo $_SESSION['user_id']; ?>">
View Requests </a><br><br>
<a href="logout.php">Logout</a>

</body>
</html>