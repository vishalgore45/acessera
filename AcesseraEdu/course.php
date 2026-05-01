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
$course = $_GET['course'] ?? '';

// check purchase
$sql = "SELECT * FROM purchases WHERE user_id='$user_id' AND course_name='$course'";
$result = $conn->query($sql);

$status = "none";

if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $status = $row['status'];
}
?>

<style>
.section {
    margin-top: 30px;
}
.card-box {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}
.video-box iframe {
    border-radius: 10px;
}
.lock-box {
    text-align: center;
    padding: 30px;
    border-radius: 12px;
    background: linear-gradient(135deg,#fff,#f1f5ff);
    border: 2px dashed #ccc;
}
</style>

<div class="container">

<h2 class="text-center fw-bold mt-4">
🎓 <?php echo htmlspecialchars($course); ?> Course
</h2>

<hr>

<!-- DEMO -->
<div class="section card-box">
<h4>🎬 Demo Videos</h4>

<div class="row mt-3">
<div class="col-md-6 mb-3 video-box">
<iframe width="100%" height="250"
src="https://www.youtube.com/embed/Sd-X_1bynCE"
allowfullscreen></iframe>
</div>

<div class="col-md-6 mb-3 video-box">
<iframe width="100%" height="250"
src="https://www.youtube.com/embed/Sd-X_1bynCE"
allowfullscreen></iframe>
</div>
</div>
</div>

<!-- COURSE CONTENT -->
<div class="section card-box">
<h4>📚 Course Content</h4>

<?php
if($status == "approved") {
?>

<p class="text-success fw-bold">🎉 Full Access Granted</p>

<div class="row">
<div class="col-md-6 mb-3 video-box">
<iframe width="100%" height="250"
src="https://www.youtube.com/embed/Sd-X_1bynCE"
allowfullscreen></iframe>
</div>

<div class="col-md-6 mb-3 video-box">
<iframe width="100%" height="250"
src="https://www.youtube.com/embed/Sd-X_1bynCE"
allowfullscreen></iframe>
</div>
</div>

<a href="certificate.php?course=<?php echo urlencode($course); ?>" 
class="btn btn-success mt-3">
🎓 Get Certificate
</a>

<?php
} else if($status == "pending") {
?>

<p class="text-warning fw-bold">⏳ Waiting for admin approval...</p>

<?php
} else {
?>

<div class="lock-box">
<h5>🔒 Locked Content</h5>
<p class="text-danger">Purchase required to unlock full course</p>

<button onclick="purchaseCourse()" class="btn btn-primary">
Purchase Course
</button>
</div>

<?php
}
?>

</div>

</div>

<!-- TOAST -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index:9999">
<div id="toastMsg" class="toast align-items-center text-bg-success border-0">
<div class="d-flex">
<div class="toast-body">
✅ Request sent! Admin will approve soon.
</div>
<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
</div>
</div>
</div>

<script>
function purchaseCourse(){
    fetch("purchase.php?course=<?php echo urlencode($course); ?>")
    .then(res => res.text())
    .then(() => {
        let toast = new bootstrap.Toast(document.getElementById('toastMsg'));
        toast.show();
    });
}
</script>

<?php include("includes/footer_simple.php"); ?>