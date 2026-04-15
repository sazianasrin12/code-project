<?php
include "db.php";

$id = $_GET['id'];

$sql = "UPDATE consultations SET status='accepted' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Request accepted";
} else {
    echo "Error";
}
?>