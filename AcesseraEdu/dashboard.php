<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include("config/db.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include("includes/header.php");

$user_id = $_SESSION['user_id'];
?>

<div class="container mt-5">

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?> 👋</h2>
<hr>

<h4>Your Dashboard</h4>

<div class="row mt-4 g-4">

<!-- COURSES -->
<div class="col-md-4">
<div class="card p-3 shadow">
<h5>📚 Enrolled Courses</h5>

<?php
$result = $conn->query("SELECT * FROM purchases WHERE user_id='$user_id' AND status='approved'");

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<p>✔ " . htmlspecialchars($row['course_name']) . "</p>";
    }
} else {
    echo "<p>No courses enrolled</p>";
}
?>

</div>
</div>

<!-- CERTIFICATES -->
<div class="col-md-4">
<div class="card p-3 shadow">
<h5>🎓 Certificates</h5>

<?php
$result = $conn->query("SELECT * FROM purchases WHERE user_id='$user_id' AND status='approved'");

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<p>" . htmlspecialchars($row['course_name']) . "<br>
        <a href='certificate.php?course=".urlencode($row['course_name'])."' class='btn btn-sm btn-success mt-1'>Download</a></p>";
    }
} else {
    echo "<p>No certificates available</p>";
}
?>

</div>
</div>

<!-- PROFILE -->
<div class="col-md-4">
<div class="card p-3 shadow">
<h5>👤 Profile</h5>
<p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
<p><strong>Status:</strong> Active</p>
</div>
</div>

</div>

<a href="logout.php" class="btn btn-danger mt-4">Logout</a>

</div>

<?php include("includes/footer_simple.php"); ?>