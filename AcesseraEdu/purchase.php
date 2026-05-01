<?php
session_start();
include("config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$course = $_GET['course'];

$sql = "INSERT INTO purchases(user_id, course_name) VALUES('$user_id', '$course')";

if($conn->query($sql)){
    echo "<h3 style='text-align:center;margin-top:50px;'>Request Sent! Wait for Admin Approval.</h3>";
} else {
    echo "Error!";
}
?>