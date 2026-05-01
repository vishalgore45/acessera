<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$name = $_SESSION['name'];
$course = $_GET['course'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Certificate</title>

<style>
body {
    text-align: center;
    font-family: Arial;
    background: #f4f4f4;
}

.certificate {
    width: 800px;
    margin: 50px auto;
    padding: 40px;
    border: 10px solid #8b5e2e;
    background: white;
}

h1 {
    font-size: 40px;
}

</style>

</head>
<body>

<div class="certificate">

<h1>Certificate of Completion</h1>

<p>This is to certify that</p>

<h2><?php echo $name; ?></h2>

<p>has successfully completed</p>

<h3><?php echo $course; ?> Course</h3>

<p>Date: <?php echo date("d-m-Y"); ?></p>

<br><br>

<button onclick="window.print()">Download Certificate</button>

</div>

</body>
</html>