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
<h3>Send Consultation Request</h3>

<form action="send_request.php" method="POST">

    <input type="hidden" name="patient_id" value="<?php echo $_SESSION['user_id']; ?>">

    Doctor:
    <select name="doctor_id">
        <?php
        include "db.php";
        $sql = "SELECT * FROM users WHERE role='doctor'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
        ?>
    </select>

    <br><br>

    Message:<br>
    <textarea name="message"></textarea>

    <br><br>

    <button type="submit">Send Request</button>

</form>
<a href="logout.php">Logout</a>

</body>
</html>