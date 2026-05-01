<?php
include("config/db.php");

$id = $_GET['id'];

$conn->query("UPDATE purchases SET status='rejected' WHERE id=$id");

header("Location: admin_dashboard.php");
?>