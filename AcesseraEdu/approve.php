<?php
include("config/db.php");

$id = $_GET['id'];

$conn->query("UPDATE purchases SET status='approved' WHERE id=$id");

header("Location: admin_dashboard.php");
?>