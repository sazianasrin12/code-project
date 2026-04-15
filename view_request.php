<?php
include "db.php";

$doctor_id = $_GET['doctor_id'];

$sql = "SELECT c.*, u.name as patient_name
        FROM consultations c
        JOIN users u ON c.patient_id = u.id
        WHERE c.doctor_id = '$doctor_id'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    echo "Patient: " . $row['patient_name'] . "<br>";
    echo "Message: " . $row['message'] . "<br>";
    echo "Status: " . $row['status'] . "<br>";

    echo "<a href='accept.php?id=".$row['id']."'>Accept</a> | ";
    echo "<a href='reject.php?id=".$row['id']."'>Reject</a>";
    echo "<hr>";
}
?>