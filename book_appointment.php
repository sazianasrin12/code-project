<?php
session_start();
include 'db.php';

// patient must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$patient_id = $_SESSION['user_id'];
$doctor_id = $_POST['doctor_id'];
$date = $_POST['date'];
$time = $_POST['time'];

$sql = "INSERT INTO appointments (patient_id, doctor_id, date, time, status)
VALUES ('$patient_id', '$doctor_id', '$date', '$time', 'Pending')";

if ($conn->query($sql)) {
    echo "Appointment booked successfully!";
    echo "<br><a href='view_doctors.php'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}
?>