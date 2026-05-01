<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include("config/db.php");

// FETCH DATA
$result = $conn->query("
SELECT purchases.*, users.name 
FROM purchases 
JOIN users ON purchases.user_id = users.id
ORDER BY purchases.id DESC
");

// STATS
$total = $conn->query("SELECT COUNT(*) as t FROM purchases")->fetch_assoc()['t'];
$approved = $conn->query("SELECT COUNT(*) as t FROM purchases WHERE status='approved'")->fetch_assoc()['t'];
$pending = $conn->query("SELECT COUNT(*) as t FROM purchases WHERE status='pending'")->fetch_assoc()['t'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* BODY */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: #f4f6f9;
}

/* SIDEBAR (MATCH HEADER GOLD THEME) */
.sidebar {
    width: 240px;
    height: 100vh;
    position: fixed;
    background: linear-gradient(to bottom, #3b1f0f, #8b5e2e);
    color: white;
    padding: 20px;
}

.sidebar h4 {
    margin-bottom: 30px;
    font-weight: 600;
}

.sidebar a {
    display: block;
    padding: 12px 15px;
    color: #f1f1f1;
    text-decoration: none;
    border-radius: 8px;
    margin-bottom: 8px;
    transition: 0.3s;
}

.sidebar a:hover {
    background: rgba(255,255,255,0.15);
    padding-left: 18px;
}

.sidebar .active {
    background: rgba(255,255,255,0.25);
}

/* MAIN */
.main {
    margin-left: 240px;
    padding: 30px;
}

/* TITLE */
.topbar h3 {
    font-weight: 600;
}

/* STATS */
.stats {
    display: flex;
    gap: 20px;
    margin: 25px 0;
}

.card-stat {
    flex: 1;
    padding: 22px;
    border-radius: 14px;
    color: white;
    text-align: center;
    font-weight: 500;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.blue { background: linear-gradient(45deg,#3b82f6,#2563eb); }
.green { background: linear-gradient(45deg,#16a34a,#15803d); }
.orange { background: linear-gradient(45deg,#f59e0b,#d97706); }

/* CARD */
.card-box {
    background: white;
    padding: 25px;
    border-radius: 14px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}

/* SEARCH */
.search-box {
    border-radius: 8px;
    height: 40px;
}

/* TABLE */
.table {
    margin-top: 15px;
    border-radius: 10px;
    overflow: hidden;
}

.table thead {
    background: #3b1f0f;
    color: white;
}

.table th {
    border: none;
    padding: 14px;
}

.table td {
    padding: 12px;
    vertical-align: middle;
}

.table tbody tr:hover {
    background: #f9fafb;
}

/* BADGES */
.badge {
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 12px;
}

.badge-approved {
    background: #16a34a;
}

.badge-pending {
    background: #f59e0b;
    color: black;
}

/* BUTTON */
.btn-approve {
    background: linear-gradient(45deg,#16a34a,#22c55e);
    color: white;
    border: none;
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 13px;
    transition: 0.3s;
}

.btn-approve:hover {
    background: #15803d;
}

/* DONE TEXT */
.done {
    color: #16a34a;
    font-weight: 500;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

<h4>⚙️ Admin</h4>

<a href="#" class="active">🏠 Dashboard</a>
<a href="#">📚 Courses</a>
<a href="#">👨‍🎓 Students</a>
<a href="#">📊 Reports</a>
<a href="#">⚙️ Settings</a>

<a href="logout.php" class="mt-4 text-danger">🚪 Logout</a>

</div>

<!-- MAIN -->
<div class="main">

<div class="topbar">
<h3>📊 Admin Dashboard</h3>
</div>

<!-- STATS -->
<div class="stats">

<div class="card-stat blue">
<h4><?php echo $total; ?></h4>
<p>Total Requests</p>
</div>

<div class="card-stat green">
<h4><?php echo $approved; ?></h4>
<p>Approved</p>
</div>

<div class="card-stat orange">
<h4><?php echo $pending; ?></h4>
<p>Pending</p>
</div>

</div>

<!-- TABLE -->
<div class="card-box">

<h5 class="mb-3">📚 Course Requests</h5>

<input type="text" id="searchInput" class="form-control search-box" placeholder="Search student or course...">

<div class="table-responsive">

<table class="table align-middle">

<thead>
<tr>
<th>Student</th>
<th>Course</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody id="tableBody">

<?php while($row = $result->fetch_assoc()) { ?>

<tr>
<td><strong><?php echo $row['name']; ?></strong></td>
<td><?php echo $row['course_name']; ?></td>

<td>
<?php if($row['status']=="approved"){ ?>
<span class="badge badge-approved">Approved</span>
<?php } else { ?>
<span class="badge badge-pending">Pending</span>
<?php } ?>
</td>

<td>
<?php if($row['status']=="pending"){ ?>
<a href="approve.php?id=<?php echo $row['id']; ?>" class="btn-approve">Approve</a>
<?php } else { ?>
<span class="done">✔ Done</span>
<?php } ?>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<script>

// SEARCH FILTER
document.getElementById("searchInput").addEventListener("keyup", function(){
let val = this.value.toLowerCase();
let rows = document.querySelectorAll("#tableBody tr");

rows.forEach(r=>{
r.style.display = r.innerText.toLowerCase().includes(val) ? "" : "none";
});
});

</script>

</body>
</html>