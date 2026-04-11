<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Patient') {
    header("Location: login.html");
    exit();
}

$sql = "SELECT * FROM users WHERE role='Doctor'";
$result = $conn->query($sql);

echo "<h2>Doctor List</h2>";

while ($row = $result->fetch_assoc()) {
    echo "<p>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Phone: " . $row['phone'] . "<br>";

    echo "<form method='POST' action='book_appointment.php'>";
    echo "<input type='hidden' name='doctor_id' value='" . $row['id'] . "'>";
    echo "Date: <input type='date' name='date' required>";
    echo "Time: <input type='time' name='time' required>";
    echo "<button type='submit'>Book Appointment</button>";
    echo "</form>";

    echo "</p><hr>";
}
?>