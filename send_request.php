<?php
include "db.php";

$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$message = $_POST['message'];

$sql = "INSERT INTO consultations (patient_id, doctor_id, message)
        VALUES ('$patient_id', '$doctor_id', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Request sent successfully";
} else {
    echo "Error: " . $conn->error;
}
?>