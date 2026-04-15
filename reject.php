<?php
include "db.php";

$id = $_GET['id'];

$sql = "UPDATE consultations SET status='rejected' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Request rejected";
} else {
    echo "Error";
}
?>