<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
} 
?>
<!DOCTYPE html>
<html>
<head>
<title>Acessera</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* FULL HEIGHT FIX */
html, body {
    height: 100%;
}

/* BODY */
body {
    padding-top: 70px;
    background: linear-gradient(135deg, #f4f6f9, #e9eef5);
}

/* MAIN CONTENT AREA */
.main-content {
    margin-left: 220px;
    min-height: calc(100vh - 120px);
    display: flex;
    align-items: center;
    justify-content: center;
}

/* HEADER */
.navbar {
    background: linear-gradient(to right, #3b1f0f, #8b5e2e);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999;
    padding: 10px 20px;
}

/* LOGO */
.logo {
    width: 45px;
}

/* SEARCH */
.search-box {
    width: 40%;
}

/* SMOOTH UI */
* {
    font-family: 'Segoe UI', sans-serif;
}

</style>

</head>
<body>

<nav class="navbar d-flex align-items-center justify-content-between">

<!-- LEFT LOGO -->
<div class="d-flex align-items-center">
    <img src="assets/logo.png" class="logo">
    <h5 class="text-white ms-2 mb-0">ACESSERA</h5>
</div>

<!-- SEARCH -->
<div class="search-box">
    <input type="text" class="form-control" placeholder="Search courses...">
</div>

<!-- RIGHT -->
<div class="d-flex align-items-center gap-3">

<?php if(isset($_SESSION['user_id'])) { ?>
    <span class="text-white">👤 <?php echo $_SESSION['name']; ?></span>
    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
<?php } else { ?>
    <a href="login.php" class="btn btn-warning">Login</a>
<?php } ?>

</div>

</nav>

<?php include("includes/sidebar.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>