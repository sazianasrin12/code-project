<?php
include 'db.php';

// Get form values safely
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 🔥 FIXED
$role = $_POST['role'];
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";

// Prevent SQL injection
$email = mysqli_real_escape_string($conn, $email);

// Check if user already exists
$check = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    echo "User already exists!";
} else {
    $sql = "INSERT INTO users (name, email, password, role, phone) 
            VALUES ('$fullname', '$email', '$password', '$role', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <a href='login.html'>Login Now</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>